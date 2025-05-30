<?php

namespace Modules\Transaction\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Speed;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function main()
    {
        $data = Transaction::all();
        return view('transaction::main', ['data' => $data]);
    }

    public function details($transaction_id)
    {
        $data = Transaction::find($transaction_id);

        if (!$data) {
            dd("Can't find transaction ID: " . $transaction_id);
        }

        return view('transaction::detail', ['data' => $data]);
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
            'speed' => 'required',
            'item' => 'required',
            'qty' => 'required',
        ]);

        $speed = Speed::find($request->speed);
        $item = Item::find($request->item);

        $inv = 'INV' . now()->format('YmdHis') . strtoupper(Str::random(4));
        $pickup_date = now()->addHours($speed->duration_hour);
        $total_price = $speed->price + $item->price * $request->qty;

        Transaction::create([
            'invoice_id' => $inv,
            'client_name' => $request->client_name,
            'cashier_name' => Auth::user()->name,
            'transaction_date' => now(),
            'pickup_date' => $pickup_date,
            'speed' => $speed->name,
            'item' => $item->name,
            'qty' => $request->qty,
            'total_price' => $total_price,
            'status' => 'pending',
            'notes' => 'kys'
        ]);

        return redirect()->route('main');
    }
}
