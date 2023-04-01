<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->nullable();
            $table->text('contact_us_short_descr')->nullable();
            $table->string('address_country')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('social_connect_short_desc')->nullable();
            $table->string('social_connect_icon_url1')->nullable();
            $table->string('social_connect_icon_url2')->nullable();
            $table->string('social_connect_icon_url3')->nullable();
            $table->string('social_connect_icon_url4')->nullable();
            $table->string('copyright')->nullable();
            


            
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
        Schema::dropIfExists('footers');
    }
};
