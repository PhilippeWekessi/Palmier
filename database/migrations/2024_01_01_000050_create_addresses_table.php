<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('label')->nullable(); // Ex: "Domicile", "Bureau"
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('commune');
            $table->string('city'); // ville
            $table->string('department'); // departement
            $table->text('address_line'); // adresse precise
            $table->text('delivery_note')->nullable(); // indication de livraison
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
