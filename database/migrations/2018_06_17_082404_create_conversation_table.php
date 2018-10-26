<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('conversation', function (Blueprint $table) {
          $table->increments('id');
          $table->string('bids_id')->length(10);
          $table->string('user_status', 255);
          $table->string('file', 255);
          $table->text('description');
          $table->integer('system_message')->length(8)->default(0);
          $table->integer('read_message')->length(8)->default(0);
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
