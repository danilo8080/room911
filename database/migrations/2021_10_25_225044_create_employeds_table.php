<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeds', function (Blueprint $table) {
            $table->bigInteger('employedID')->unique();
            $table->string('department');
            $table->string('lastName');
            $table->string('middleName');
            $table->string('firstName');
            $table->boolean('Access');
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
        Schema::dropIfExists('employeds');
    }
}
