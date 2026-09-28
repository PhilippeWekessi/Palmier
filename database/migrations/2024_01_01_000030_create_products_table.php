<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('reference')->unique(); // reference interne (SKU)
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('variety')->nullable(); // variete (ex: Tenera)
            $table->string('age')->nullable(); // age (ex: "6 mois")
            $table->decimal('price', 12, 2);
            $table->decimal('old_price', 12, 2)->nullable();
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('low_stock_threshold')->default(5); // seuil d'alerte
            $table->string('image')->nullable(); // image principale
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active', 'category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
