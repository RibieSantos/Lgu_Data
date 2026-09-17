<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_document_id')->constrained('inventory_documents')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('item_title')->nullable();
            $table->string('description')->nullable();
            $table->string('unit')->nullable();
            $table->integer('qty')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('inventory_item_no')->nullable();
            $table->string('property_no')->nullable();
            $table->date('acquired_date')->nullable();
            $table->date('disposal_date')->nullable();
            $table->integer('estimated_life')->nullable();
            $table->decimal('unit_cost', 12, 2)->nullable();
            $table->decimal('total_cost', 12, 2)->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_items');
    }
};
