<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculatorItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculator_items', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['fuel', 'electricity', 'gas']);
            $table->string('name');
            $table->float('price_per_unit');
            $table->float('carbon_offset');
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
        Schema::dropIfExists('calculator_items');
    }
}
