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
            //ip  user ip address
            //date  time of visit seconds are also created    
            //url  the link user navigate to it 
            //post_id  the post user request it  
            //user_agent information about user device (Operating system ... )
// The User-Agent request header is a characteristic string that lets 
// servers and network peers identify the application, operating system, vendor, and/or version of the requesting
// device  desktop , tablet, phone

$table->string("ip");
$table->string("date");
$table->string("url");
$table->string("post_id");
$table->string("user_agent");
$table->string("isrobot");
$table->string("browser");
$table->string("device");
$table->string("operatingsystem");


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
