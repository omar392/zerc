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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('email');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('instagram');
            $table->longText('address_ar');
            $table->longText('address_en');
            //
            $table->longText('description_ar');
            $table->longText('description_en');
            $table->string('title_ar');
            $table->string('title_en');
            //
            $table->string('mail_transport');
            $table->string('mail_host');
            $table->string('mail_port');
            $table->string('mail_username');
            $table->string('mail_password');
            $table->string('mail_encryption');
            $table->string('mail_from');
            //
            $table->string('contact_mail');
            $table->string('job_mail');
            $table->string('sub_mail');
            //
            $table->string('brandtitle_ar');
            $table->string('brandtitle_en');
            $table->string('welcometext_ar');
            $table->string('welcometext_en');
            $table->string('msgtext_ar');
            $table->string('msgtext_en');

            //
            $table->string('footer_ar');
            $table->string('footer_en');

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
};