<?php

namespace Modules\Transaction\App\Http\Controllers;

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
        $data = Transaction::with('details')->get();
        return view('transaction::main', ['data' => $data]);
    }

    public function details($transaction_id)
    {
        $data = Transaction::find($transaction_id);

        $order_items = $data->details;

        if (!$data) {
            dd("Can't find transaction ID: " . $transaction_id);
        }

        return view('transaction::detail', ['data' => $data, 'order_items' => $order_items]);
    }

    public function advance($transaction_id)
    {
        $order = Transaction::find($transaction_id);
        $order->advanceStatus();
        $order->save();

        return redirect()->route('main');
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
            'notes' => 'kys'
        ]);

        foreach ($request->items as $item) {
            $speed = Speed::find($item['speed_id']);
            $product = Item::find($item['item_id']);
            $subtotal = $speed->price + $product->price * $item['qty'];

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

        return redirect()->route('main');
    }

    public function edit($transaction_id)
    {

    }

    public function delete($transaction_id)
    {

    }
}
