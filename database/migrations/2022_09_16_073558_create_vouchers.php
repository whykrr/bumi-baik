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
            $table->integer('planting_id')->index('idx_planting_id');
            $table->integer('get_tree_id');
            $table->text('description');
            $table->text('terms');
            $table->float('value');
            $table->integer('quantity');
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
