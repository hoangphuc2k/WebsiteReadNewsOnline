<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Username',100);
            $table->string('email',200)->unique();
            $table->string('FullName',200);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',200);
            $table->bigInteger('RoleCode_FK')->unsigned();
            $table->string('Img',200);
            $table->dateTime('Munlog')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('Status',3)->default('Yes');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
