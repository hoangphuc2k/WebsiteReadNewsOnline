<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SaveNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('SaveNews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("iduser")->unsigned();
            $table->bigInteger("idnews")->unsigned();
            $table->string('Status',3)->default('Yes');
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
        //
    }
}
