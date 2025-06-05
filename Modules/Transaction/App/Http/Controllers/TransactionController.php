<?php

namespace Modules\Transaction\App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Speed;
use App\Models\Item;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Enums\OrderStatus;

class TransactionController extends Controller
{
    public function main()
    {
        $data = Transaction::with('details')->where('finished', false)->orderBy('transaction_date', 'desc')->get();
        return view('transaction::main', ['data' => $data]);
    }

    public function history()
    {
        $data = Transaction::with('details')->where('finished', true)->orderBy('transaction_date', 'desc')->get();
        return view('transaction::history', ['data' => $data]);
    }

    public function receipt($transaction_id)
    {
        $data = Transaction::with('details')->where('transaction_id', $transaction_id)->first();

        $order_items = $data->details;

        return view('transaction::receipt', ['data' => $data, 'order_items' => $order_items]);
    }


    public function details($transaction_id)
    {
        $data = Transaction::find($transaction_id);

        $order_items = $data->details()->where('status', '!=', 'picked_up')->get();

        if (!$data) {
            dd("Can't find transaction ID: " . $transaction_id);
        }

        if ($data->finished) {
            return redirect()->route('main');
        }

        return view('transaction::detail', ['data' => $data, 'order_items' => $order_items]);
    }

    public function history_details($transaction_id)
    {
        $data = Transaction::find($transaction_id);

        $order_items = $data->details;

        if (!$data) {
            dd("Can't find transaction ID: " . $transaction_id);
        }

        return view('transaction::history_detail', ['data' => $data, 'order_items' => $order_items]);
    }

    public function advance($detail_id)
    {
        $order = TransactionDetail::find($detail_id);
        $order->advanceStatus();
        $order->save();

        $transaction = $order->transaction;

        $allPickedUp = $transaction->details()->where('status', '!=', 'picked_up')->count() === 0;

        if ($allPickedUp) {
            $transaction->finished = true;
            $transaction->save();
        }

        return redirect()->route('details', ['transaction_id' => $order->transaction_id]);
    }


    public function create()
    {
        $speed = Speed::all();
        $item = item::all();
        return view('transaction::create', compact('speed', 'item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'items' => 'required|array|min:1',
            'items.*.speed_id' => 'required|exists:speed,speed_id',
            'items.*.item_id' => 'required|exists:item,item_id',
            'items.*.qty' => 'required|integer|min:1',
        ]);

        $inv = 'INV' . now()->format('YmdHis') . strtoupper(Str::random(4));

        $transaction = Transaction::create([
            'invoice_id' => $inv,
            'client_name' => $request->client_name,
            'cashier_name' => Auth::user()->name,
            'transaction_date' => now(),
            'total' => 0,
            'notes' => 'kys',
            'finished' => false
        ]);

        foreach ($request->items as $item) {
            $speed = Speed::find($item['speed_id']);
            $product = Item::find($item['item_id']);
            $subtotal = ($speed->price + $product->price) * $item['qty'];

            TransactionDetail::create([
                'transaction_id' => $transaction->transaction_id,
                'speed' => $speed->name,
                'item' => $product->name,
                'qty' => $item['qty'],
                'finish_date' => now()->addHours($speed->duration_hours),
                'subtotal' => $subtotal,
                'status' => 'pending',
            ]);

            $transaction->total += $subtotal;
        }

        $transaction->save();

        return redirect()->route('receipt', ['transaction_id' => $transaction->transaction_id]);
    }

    public function edit($transaction_id)
    {
        $data = Transaction::find($transaction_id);
        return view('transaction::edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $transaction = Transaction::find($request->transaction_id);
        $transaction->client_name = $request->client_name;
        $transaction->notes = $request->notes;

        $transaction->save();

        return redirect()->route('details', ['transaction_id' => $request->transaction_id]);
    }

    public function edit_item($detail_id)
    {
        $data = TransactionDetail::find($detail_id);
        $speed = Speed::all();
        $item = Item::all();
        return view('transaction::edit_detail', ['data' => $data, 'speed' => $speed, 'item' => $item]);
    }

    public function update_item(Request $request)
    {
        $request->validate([
            'speed' => 'required',
            'item' => 'required',
            'qty' => 'required',
        ]);

        $speed = Speed::find($request->speed);
        $item = Item::find($request->item);

        $OrderItem = TransactionDetail::find($request->detail_id);
        $OrderItem->speed = $speed->name;
        $OrderItem->item = $item->name;
        $OrderItem->qty = $request->qty;
        $OrderItem->subtotal = ($speed->price + $item->price) * $request->qty;
        $OrderItem->finish_date = now()->addHours($speed->duration_hours);

        $OrderItem->save();

        $transaction = Transaction::find($request->transaction_id);
        $total = $transaction->details()->sum('subtotal');
        $transaction->total = $total;

        $transaction->save();

        return redirect()->route('details', ['transaction_id' => $request->transaction_id]);
    }

    public function delete($transaction_id)
    {
        Transaction::destroy($transaction_id);
        return redirect()->route('main');
    }

    public function delete_item($detail_id, $transaction_id)
    {
        TransactionDetail::destroy($detail_id);
        $hasItems = TransactionDetail::where('transaction_id', $transaction_id)->exists();

        if ($hasItems) {
            return redirect()->back();
        } else {
            Transaction::destroy($transaction_id);
            return redirect()->route('main');
        }
    }
}
