<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Add Transaction</title>
</head>

<body class="home">
    <div class="sidebar">
        <div class="sidebar_content">Home</div>
        <div class="sidebar_content">Users</div>
        <div class="sidebar_content">Speed</div>
        <div class="sidebar_content">Item</div>
        <div class="sidebar_content">Report</div>
        <div class="sidebar_content">Logout</div>
    </div>
    <div class="home_content">
        <a href="" class="add_x">Back</a>
        <h1>RESIK LAUNDRY</h1>
        <div class="card_transaction_create">
            <form action="" class="form_create_transaction">
                <div class="form_item">
                    <label for="">Client Name</label>
                    <input type="text">
                </div>
                <div class="form_item">
                    <label for="">Speed</label>
                    <select name="" id="">
                        <option value="">3 Days</option>
                        <option value="">2 Hours</option>
                    </select>
                </div>
                <div class="form_item">
                    <label for="">Notes</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
                <button class="btn_submit_create_transaction">Add Transaction</button>
            </form>
        </div>
    </div>
</body>

</html>