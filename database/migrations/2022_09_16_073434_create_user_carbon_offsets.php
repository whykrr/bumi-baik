<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCarbonOffsets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_carbon_offsets', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('user_id')->index('idx_user_id');
            $table->string('transaction_id')->index('idx_transaction_id');
            $table->date("offset_date");
            $table->float('total_offset');
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
        Schema::dropIfExists('user_carbon_offsets');
    }
}
