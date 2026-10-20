<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_offices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->constrained('customers');

            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');

            $table->unique(['customer_id', 'name']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_offices');
    }
};
