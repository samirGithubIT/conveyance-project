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
        Schema::create('conveyance_vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->constrained()->cascadeOnDelete();
            $table->foreignId('conveyance_id')->unsigned()->constrained()->cascadeOnDelete();
            $table->string('from_location');
            $table->string('to_location');
            $table->decimal('amount', 6, 2);
            $table->string('remarks')->nullable();
            $table->enum('status' , ['pending', 'paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conveyance_vouchers');
    }
};
