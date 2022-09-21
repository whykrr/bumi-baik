<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTrees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trees', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->bigInteger('user_id')->index('idx_user_id');
            $table->bigInteger('tree_id')->index('idx_tree_id');
            $table->string('transaction_id')->index('idx_transaction_id');
            $table->date("date_adopted")->index('idx_date_adopted');
            $table->float('user_tree_sequestration')->nullable();
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
        Schema::dropIfExists('user_trees');
    }
}
