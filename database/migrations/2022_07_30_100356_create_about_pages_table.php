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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable;
            $table->string('short_title')->nullable;
            $table->text('long_description')->nullable;
            $table->string('skill_category')->nullable;
            $table->string('services_title')->nullable;
            $table->string('services_description')->nullable;
            $table->string('short_card_story_title')->nullable;
            $table->string('short_card_social_title')->nullable;
            $table->string('short_card_work_title')->nullable;   
            $table->string('about_me_image')->nullable;           
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
        Schema::dropIfExists('about_pages');
    }
};
