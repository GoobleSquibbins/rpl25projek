<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_detail';
    protected $primaryKey = 'detail_id';
    protected $fillable = [
        'transaction_id',
        'speed',
        'item',
        'qty',
        'subtotal',
        'finish_date',
        'status',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function transaction()
{
    return $this->belongsTo(Transaction::class, 'transaction_id');
}

    public function advanceStatus(): void
    {
        switch ($this->status) {
            case OrderStatus::Pending:
                $this->status = OrderStatus::InProgress;
                break;
            case OrderStatus::InProgress:
                $this->status = OrderStatus::Done;
                break;
            case OrderStatus::Done:
                $this->status = OrderStatus::PickedUp;
                break;
            default:
                return; // already picked up or invalid
        }

        $this->save();
    }
}