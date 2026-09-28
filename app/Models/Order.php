<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    // --- Statuts de commande (section 10 du cahier des charges) ---
    public const STATUS_PENDING = 'pending';
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_READY = 'ready';
    public const STATUS_SHIPPED = 'shipped';
    public const STATUS_DELIVERED = 'delivered';
    public const STATUS_CANCELLED = 'cancelled';

    public const STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_CONFIRMED,
        self::STATUS_PROCESSING,
        self::STATUS_READY,
        self::STATUS_SHIPPED,
        self::STATUS_DELIVERED,
        self::STATUS_CANCELLED,
    ];

    // --- Modes de paiement ---
    public const PAYMENT_CASH_ON_DELIVERY = 'cash_on_delivery';
    public const PAYMENT_MOBILE_MONEY = 'mobile_money';

    protected $fillable = [
        'order_number',
        'user_id',
        'delivery_zone_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'commune',
        'city',
        'department',
        'address_line',
        'delivery_note',
        'comment',
        'subtotal',
        'delivery_fee',
        'total',
        'status',
        'payment_method',
        'confirmed_at',
        'shipped_at',
        'delivered_at',
        'cancelled_at',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'delivery_fee' => 'decimal:2',
            'total' => 'decimal:2',
            'confirmed_at' => 'datetime',
            'shipped_at' => 'datetime',
            'delivered_at' => 'datetime',
            'cancelled_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            if (empty($order->order_number)) {
                $order->order_number = static::generateOrderNumber();
            }
        });
    }

    /**
     * Genere un numero de commande unique au format EP-{annee}-{sequence sur 6 chiffres}.
     * Exemple : EP-2026-000001
     */
    public static function generateOrderNumber(): string
    {
        $prefix = config('elaeis.order_prefix', 'EP');
        $year = now()->year;

        $lastSequence = static::query()
            ->where('order_number', 'like', "{$prefix}-{$year}-%")
            ->count();

        $next = $lastSequence + 1;

        return sprintf('%s-%d-%06d', $prefix, $year, $next);
    }

    // --- Relations ---

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function deliveryZone(): BelongsTo
    {
        return $this->belongsTo(DeliveryZone::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    // --- Aides métier ---

    public function statusLabel(): string
    {
        return config("elaeis.order_statuses.{$this->status}", $this->status);
    }

    public function isCancelled(): bool
    {
        return $this->status === self::STATUS_CANCELLED;
    }
}
