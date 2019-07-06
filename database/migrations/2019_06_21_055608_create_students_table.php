<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /*
        id, name, code, email, mobile number, state, city, centre, pincode, address, status
    */
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('code');
            $table->string('email');
            $table->string('mobile');
            $table->string('state');
            $table->string('city');
            $table->string('centre');
            $table->string('pincode');
            $table->string('address');
            $table->string('status');

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
        Schema::dropIfExists('students');
    }
}
