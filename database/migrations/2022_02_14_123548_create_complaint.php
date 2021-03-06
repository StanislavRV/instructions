<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable(false);
        });

        Schema::table("complaint", function (Blueprint $table){

            $table->unsignedBigInteger("instruction_id");            
            $table->foreign("instruction_id")->references("id")->on("instruction");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaint', function (Blueprint $table){
            $table->dropConstrainedForeignId("instruction_id");           
                      
        });

        Schema::dropIfExists('complaint');
    }
}
