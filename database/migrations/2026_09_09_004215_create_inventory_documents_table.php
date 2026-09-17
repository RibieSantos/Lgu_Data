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
        Schema::create('inventory_documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_no')->unique();
            $table->foreignId('accountable_person_id')->constrained('employee')->onDelete('cascade');
            $table->enum('document_type', ['ICS', 'PAR']);
            $table->string('fund')->nullable();
            $table->date('document_date')->nullable();
            $table->foreignId('received_from_id')->constrained('employee')->onDelete('cascade');
            $table->foreignId('received_by_id')->constrained('employee')->onDelete('cascade');
            $table->string('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_documents');
    }
};
