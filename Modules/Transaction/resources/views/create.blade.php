<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Add Transaction</title>
</head>

<body>
    <div class="main">
        <div class="sidebar">
            @if (Auth::user()->role == 'admin')
                <a class="sidebar_content" href="{{ route('main') }}" id="active">Transaction</a>
                <a class="sidebar_content" href="{{ route('user') }}">Users</a>
                <a class="sidebar_content" href="{{ route('speed') }}">Speed</a>
                <a class="sidebar_content" href="{{ route('item') }}">Item</a>
                <a class="sidebar_content" href="{{ route('report') }}">Report</a>
                <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
            @endif
        </div>
        <div class="home_content">
            <a href="{{ route('main')  }}" class="add_x">Back</a>
            <h1 class="title">ADD TRANSACTION</h1>
            <div class="card_user_create">
                <form action="{{ route('store.transaction') }}" method="post" class="form_create_user">
                    @csrf

                    <div class="form_item">
                        <label for="client_name">Client Name</label>
                        <input type="text" id="client_name" name="client_name">
                        @error('client_name')
                            <p class="user_create_err">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="order_items" id="order-items">
                        <div class="order_card">
                            <div class="form_item">
                                <label>Speed</label>
                                <select name="items[0][speed_id]" required>
                                    <option value="">Pick speed</option>
                                    @foreach ($speed as $s)
                                        <option value="{{ $s->speed_id }}">
                                            {{ $s->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form_item">
                                <label>Item</label>
                                <select name="items[0][item_id]" required>
                                    <option value="">Pick item</option>
                                    @foreach ($item as $i)
                                        <option value="{{ $i->item_id }}">
                                            {{ $i->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form_item">
                                <label>QTY</label>
                                <input type="number" name="items[0][qty]" required>
                                @error('items.0.qty')
                                    <p class="user_create_err">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn_add_item" id="add-item">Add More Item</button>

                    <div class="form_item">
                        <label for="notes">Notes</label>
                        <textarea name="notes" id="notes" cols="30" rows="10"></textarea>
                    </div>

                    <button class="btn_submit_create" type="submit">Submit Transaction</button>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    let itemIndex = 1;

    document.getElementById('add-item').addEventListener('click', () => {
        const container = document.getElementById('order-items');
        const newCard = document.querySelector('.order_card').cloneNode(true);

        newCard.querySelectorAll('select, input').forEach(el => {
            if (el.name) {
                el.name = el.name.replace(/\[\d+\]/, `[${itemIndex}]`);
            }
            if (el.tagName === 'INPUT') el.value = '';
            if (el.tagName === 'SELECT') el.selectedIndex = 0;
        });

        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.textContent = 'Remove';
        removeBtn.classList.add('remove-item');
        newCard.appendChild(removeBtn);

        container.appendChild(newCard);
        itemIndex++;
    });

    document.getElementById('order-items').addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.order_card').remove();
        }
    });


</script>


</html>