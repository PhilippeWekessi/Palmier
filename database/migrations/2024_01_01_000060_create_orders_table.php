<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // Ex: EP-2026-000001
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->foreignId('delivery_zone_id')->nullable()->constrained()->nullOnDelete();

            // Informations client au moment de la commande (snapshot)
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->string('commune');
            $table->string('city');
            $table->string('department');
            $table->text('address_line');
            $table->text('delivery_note')->nullable();
            $table->text('comment')->nullable();

            // Montants
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('delivery_fee', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);

            // Statut de commande
            $table->string('status')->default('pending');
            // pending, confirmed, processing, ready, shipped, delivered, cancelled

            // Paiement
            $table->string('payment_method')->nullable(); // cash_on_delivery, mobile_money

            // Horodatage du cycle de vie
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->timestamps();

            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
