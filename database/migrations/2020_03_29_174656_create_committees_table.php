<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('position')->unsigned()->nullable();
            $table->string('degination')->nullable();
            $table->string('image')->nullable();
            $table->boolean('show_in_front')->default(0);
            $table->enum('status', ['Active', 'Inactive']);
            $table->longText('message')->nullable();
            $table->integer('school_id')->unsigned();
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
        Schema::dropIfExists('committees');
    }
}
