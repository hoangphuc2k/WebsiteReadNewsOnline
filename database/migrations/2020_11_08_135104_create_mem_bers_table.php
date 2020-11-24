<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemBersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mem_bers', function (Blueprint $table) {
            $table->string('Usemember',200);
            $table->string('Password',20);
            $table->string('Email',200);
            $table->string('FullName',100);
            $table->dateTime('RegisterDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('Status')->default('Yes');
            $table->timestamps();
            $table->primary('Usemember');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mem_bers');
    }
}
