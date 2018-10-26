<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('freelancer_bid', function (Blueprint $table) {
          $table->increments('id');
          $table->string('bids_uniq')->unique();
          $table->unsignedInteger('projects_id')->length(10);
          $table->unsignedInteger('user_id')->length(10);
          $table->string('bid_ammount', 255)->nullable();
          $table->integer('projects_done')->length(8)->default(0);
          $table->integer('host_accepted')->length(8)->default(0);
          $table->integer('bid_accepted')->length(8)->default(0);
          $table->integer('projects_fail')->length(8)->default(0);
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
