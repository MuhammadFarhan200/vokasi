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
        Schema::create('logos', function (Blueprint $table) {
            $table->id();
            $table->longText('thumbnail')->nullable();
            $table->longText('faculty')->nullable();
            $table->longText('university')->nullable();
            $table->longText('facebook_url')->nullable();
            $table->longText('instagram_url')->nullable();
            $table->longText('youtube_url')->nullable();
            $table->longText('linkedin_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('web_footers', function (Blueprint $table) {
            $table->id();
            $table->longText('section')->nullable();
            $table->longText('text')->nullable();
            $table->longText('url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('pak_simulations', function (Blueprint $table) {
            $table->id();
            $table->longText('url')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('logos');
        Schema::dropIfExists('web_footers');
        Schema::dropIfExists('pak_simulations');
    }
};
