<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle')->nullable(true);
            $table->string('image')->nullable(true);
            $table->integer('package_status');
            $table->integer('min_personnes')->nullable(true);
            $table->integer('max_personnes')->nullable(true);
            $table->decimal('full_price', 10, 2);
            $table->integer('nb_personnes')->nullable(true);
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
        Schema::dropIfExists('packages');
    }
}
