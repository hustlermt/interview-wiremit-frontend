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
        Schema::create('send_money', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_country');
            $table->string('recipient_name');
            $table->string('recipient_email')->nullable();
            $table->decimal('amount_usd', 10, 2);
            $table->decimal('transaction_fee', 10, 2);
            $table->decimal('final_amount', 10, 2);
            $table->string('payment_method');
            $table->string('account_number', 10); 
            $table->unsignedBigInteger('user_id'); 
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('send_money');
    }
};
