<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('projects', function (Blueprint $table) {
          $table->increments('id');
          $table->string('projects_uniq')->unique();
          $table->unsignedInteger('user_id')->length(10);
          $table->string('title', 255);
          $table->text('description');
          $table->integer('finish_day')->length(10);
          $table->string('budget_level', 255);
          $table->string('projects_budget', 255);
          $table->text('projects_filtering');
          $table->date('start_date');
          $table->date('finish_date');
          $table->integer('active')->length(8)->default(0);
          $table->string('projects_status', 255);
          $table->unsignedInteger('accepted_freelancer')->length(10);
          $table->string('accepted_budget', 255);
          $table->string('file', 255);
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
        Schema::dropIfExists('peoject');
    }
}
