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
        Schema::create('covers', function (Blueprint $table) {
            $table->id();
            $table->string('image_about');
            $table->string('image_service');
            $table->string('image_faqs');
            $table->string('image_faqs_2');
            $table->string('image_blog');
            $table->string('image_about_2');
            $table->string('image_about_3');
            $table->string('image_gallery');
            $table->string('image_offer');
            $table->string('image_offer_single');
            $table->string('image_contact');
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
        Schema::dropIfExists('covers');
    }
};
