<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCalculates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_calculates', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('user_id')->index('idx_user_id');
            $table->date("measurement_date");
            $table->text("measurement_data");
            $table->float('result');
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
        Schema::dropIfExists('user_calculates');
    }
}
