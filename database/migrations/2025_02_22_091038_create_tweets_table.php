<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema; 

class CreateTweetsTable extends Migration {
    public function up() {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('tweet_id')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down() {
        Schema::dropIfExists('tweets');
    }
}
