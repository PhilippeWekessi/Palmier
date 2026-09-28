<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();

            // cash_on_delivery, mtn_mobile_money, moov_mobile_money
            $table->string('method');

            // pending, simulated_paid, paid, failed
            $table->string('status')->default('pending');

            $table->decimal('amount', 12, 2);

            // Reference de transaction (simulee en local, reelle plus tard via API)
            $table->string('reference')->nullable();

            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            // IMPORTANT : aucune donnee bancaire sensible n'est jamais stockee ici.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
