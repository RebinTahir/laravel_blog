<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string("ip");// user ip address
            $table->string("date");// time of visit seconds are also created    
            $table->string("url"); // the link user navigate to it 
            $table->string("post_id"); // the post user request it  
            $table->string("user_agent"); // information about user device (Operating system ... )
// The User-Agent request header is a characteristic string that lets 
// servers and network peers identify the application, operating system, vendor, and/or version of the requesting

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
