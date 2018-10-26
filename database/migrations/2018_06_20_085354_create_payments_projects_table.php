<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('payments_projects', function (Blueprint $table) {
          $table->increments('id');
          $table->string('payments_uniq')->unique();
          $table->unsignedInteger('projects_id')->length(10);
          $table->unsignedInteger('host_id')->length(10);
          $table->unsignedInteger('freelancer_id')->length(10);
          $table->string('ammount', 255)->nullable();
          $table->integer('payments_gateway')->length(8)->default(0);
          $table->integer('manual_transfer')->length(8)->default(0);
          $table->integer('payments_convirmation')->length(8)->default(0);
          $table->integer('status')->length(8)->default(0);
          $table->String('img', 255)->nullable();
          $table->String('bank_name', 255)->nullable();
          $table->String('rekening_name', 255)->nullable();
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
