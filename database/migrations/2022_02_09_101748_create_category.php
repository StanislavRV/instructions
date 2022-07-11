<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);

            
        });

        Schema::table("instruction", function (Blueprint $table){
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("user_id");
            $table->foreign("category_id")->references("id")->on("category");
            $table->foreign("user_id")->references("id")->on("users");
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instruction', function (Blueprint $table){
            $table->dropConstrainedForeignId("category_id");            
            $table->dropConstrainedForeignId("user_id");            
        });

        Schema::dropIfExists('category');


    }
}
