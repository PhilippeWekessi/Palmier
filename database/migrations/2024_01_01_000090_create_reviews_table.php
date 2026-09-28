<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // nullable : permet un temoignage general (page d'accueil) non lie a un produit precis
            $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete();

            $table->unsignedTinyInteger('rating'); // note de 1 a 5
            $table->text('comment')->nullable();

            // pending, approved, hidden
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
