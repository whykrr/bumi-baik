<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('partner_id')->index('idx_partner_id');
            $table->integer('tree_type_id')->index('idx_tree_type_id');
            $table->text('description');
            $table->date('planting_date');
            $table->text('image');
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
        Schema::dropIfExists('plantings');
    }
}
