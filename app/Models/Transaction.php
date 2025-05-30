<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $primaryKey = 'transaction_id';
    protected $fillable = [
        'invoice_id',
        'client_name',
        'cashier_name',
        'transaction_date',
        'pickup_date',
        'speed',
        'item',
        'qty',
        'total_price',
        'status',
        'notes',
    ];
}
