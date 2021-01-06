<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('IdNews');
            $table->bigInteger('CateId_FK')->unsigned();
            $table->bigInteger("id_user_FK")->unsigned();
            $table->string('Title',1000);
            $table->longText('Content');
            $table->string('Description',1000);
            $table->string('KeyWord',1000);
            $table->string('Author',200);
            $table->string('Picture',200);
            $table->bigInteger('Numread')->default(1);
            $table->string('Status',3)->default('not');
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
        Schema::dropIfExists('news');
    }
}
