<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cost')->default(0);
            $table->string('date');
            $table->string('type');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('group_id');
            $table->timestamps();
             
            
        });
        Schema::table('records', function($table) {
            $table->foreign('group_id')->references('id')->on('groups');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('records', function (Blueprint $table) {
        $table->dropForeign('group_id');
        $table->dropIfExists('record');
        });
    }
}
