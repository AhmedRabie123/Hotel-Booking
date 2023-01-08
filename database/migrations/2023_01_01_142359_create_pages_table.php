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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('about_heading');
            $table->text('about_content');
            $table->string('about_status');
            $table->string('terms_heading');
            $table->text('terms_content');
            $table->string('terms_status');
            $table->string('privacy_heading');
            $table->text('privacy_content');
            $table->string('privacy_status');
            $table->string('contact_heading');
            $table->text('contact_map')->nullable();
            $table->string('contact_status');
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
        Schema::dropIfExists('pages');
    }
};
