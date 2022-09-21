<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->index('idx_code');
            $table->string('type')->index('idx_type');
            $table->bigInteger('tree_id')->index('idx_tree_id');
            $table->integer('planting_id')->index('idx_planting_id')->nullable();
            $table->text('description')->nullable();
            $table->text('terms')->nullable();
            $table->integer('value');
            $table->integer('qty_tree')->nullable();
            $table->integer('quota');
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
        Schema::dropIfExists('vouchers');
    }
}
