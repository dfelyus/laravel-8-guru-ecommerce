<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bg')->nullable(true);
            $table->string('logo')->nullable(true);
            $table->string('Header_message')->nullable(true);
            $table->string('imageslide1')->nullable(true);
            $table->string('imageslide2')->nullable(true);
            $table->string('imageslide3')->nullable(true);
            $table->string('phone_number')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('country')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('footerlogo')->nullable(true);
            $table->integer('setting_status');
            $table->string('about_us_image');
            $table->text('about_us');
            $table->text('our_menu');
            $table->text('terms_conditions')->nullable(true);
            $table->text('map')->nullable(true);
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
        Schema::dropIfExists('settings');
    }
}
