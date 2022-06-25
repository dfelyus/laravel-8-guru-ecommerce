<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('category_id');
            $table->string('dish_name');
            $table->longText('dish_detail');
            $table->text('dish_image');
            $table->integer('dish_status');
            $table->decimal('full_price', 10, 2)->nullable(true);
            $table->decimal('half_price', 10, 2)->nullable(true);
            $table->integer('qty')->default(0);
            $table->dateTime('added_on')
                ->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(true);
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
        Schema::dropIfExists('dishes');
    }
}
