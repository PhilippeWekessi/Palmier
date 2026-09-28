<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    // --- Methodes de paiement ---
    public const METHOD_CASH_ON_DELIVERY = 'cash_on_delivery';
    public const METHOD_MTN_MOBILE_MONEY = 'mtn_mobile_money';
    public const METHOD_MOOV_MOBILE_MONEY = 'moov_mobile_money';

    // --- Statuts ---
    public const STATUS_PENDING = 'pending';
    public const STATUS_SIMULATED_PAID = 'simulated_paid'; // paiement simule (environnement local)
    public const STATUS_PAID = 'paid';
    public const STATUS_FAILED = 'failed';

    protected $fillable = [
        'order_id',
        'method',
        'status',
        'amount',
        'reference',
        'paid_at',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'paid_at' => 'datetime',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
