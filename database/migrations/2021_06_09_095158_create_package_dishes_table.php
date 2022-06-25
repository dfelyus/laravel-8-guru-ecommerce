<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_dishes', function (Blueprint $table) {
            $table->integer('package_id')->unsigned()->index();
            $table->integer('dish_id')->unsigned()->index();

            $table->foreign('package_id')->references('dish_id')->on('dishes')->onDelete('cascade'); //tag table
            $table->foreign('dish_id')->references('package_id')->on('packages')->onDelete('cascade');
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
        Schema::dropIfExists('package_dishes');
    }
}
