<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreateTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('payment_transaction_id')->index()->nullable();
            $table->string('order_code')->unique();
            $table->bigInteger('user_id')->index();
            $table->date('date')->index();
            $table->integer('tree_type_id')->index();
            $table->integer('planting_id')->index()->nullable();
            $table->float('total');
            $table->string('voucher_id')->index()->nullable();
            $table->string('voucher_code')->nullable();
            $table->string('voucher_value')->nullable();
            $table->float('grand_total');
            $table->string('payment_method');
            $table->text('payment_detail')->nullable();
            $table->enum('status', ['payment_pending', 'payment_verified', 'completed', 'canceled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
