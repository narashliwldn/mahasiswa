<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('coffee_name');
            $table->string('variety');
            $table->string('altitude');
            $table->string('terroir');
            $table->string('producer');
            $table->string('harvest_period');
            $table->string('postharvest_process');
            $table->string('postharvest_processor');
            $table->string('roaster');
            $table->string('country_of_roaster');
            $table->string('roast_profile');
            $table->text('flavor');
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
        Schema::dropIfExists('posts');
    }
}
