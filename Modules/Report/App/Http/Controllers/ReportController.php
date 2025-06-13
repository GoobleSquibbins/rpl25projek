<?php

namespace Modules\Report\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Speed;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('details')->get();

        $opt = 'all';
        return view('report::report', ['transactions' => $transactions, 'opt' => $opt]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function today()
    {
        $transactions = Transaction::with('details')->whereBetween('transaction_date', [
            now()->startOfDay(),
            now()->endOfDay()
        ])->get();

        $opt = 'today';
        return view('report::report', ['transactions' => $transactions, 'opt' => $opt]);
    }

    public function week()
    {
        $transactions = Transaction::with('details')->whereBetween('transaction_date', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->get();

        $opt = 'week';
        return view('report::report', ['transactions' => $transactions, 'opt' => $opt]);
    }

    public function month()
    {
        $transactions = Transaction::with('details')->whereBetween('transaction_date', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->get();

        $opt = 'month';
        return view('report::report', ['transactions' => $transactions, 'opt' => $opt]);
    }

    public function cust_date(Request $request)
    {
        $start = Carbon::parse($request->from)->startOfDay();
        $end = Carbon::parse($request->to)->endOfDay();

        $transactions = Transaction::with('details')
            ->whereBetween('transaction_date', [$start, $end])
            ->get();
        $opt = 'cust';
        $from = $request->from;
        $to = $request->to;
        return view('report::report', ['transactions' => $transactions, 'opt' => $opt, 'from' => $from, 'to' => $to]);
    }

    public function print(Request $request)
    {
        $opt = $request->opt;

        switch ($opt) {
            case 'all':
                $transactions = Transaction::with('details')->get();
                return view('report::print', [
                    'transactions' => $transactions,
                    'opt' => 'all',
                    'from' => null,
                    'to' => null
                ]);
            case 'today':
                $start = now()->startOfDay();
                $end = now()->endOfDay();
                break;
            case 'week':
                $start = now()->startOfWeek();
                $end = now()->endOfWeek();
                break;
            case 'month':
                $start = now()->startOfMonth();
                $end = now()->endOfMonth();
                break;
            case 'cust':
                $start = Carbon::parse($request->from)->startOfDay();
                $end = Carbon::parse($request->to)->endOfDay();
                break;
            default:
                abort(400, "Invalid report option");
        }

        $transactions = Transaction::with('details')
            ->whereBetween('transaction_date', [$start, $end])
            ->get();

        return view('report::print', [
            'transactions' => $transactions,
            'opt' => $opt,
            'from' => $start,
            'to' => $end
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('report::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('report::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
