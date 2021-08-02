<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('job_title')->nullable();
            $table->text('address')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('DOB')->nullable();
            $table->date('join_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('staff_type_id')->unsigned();
            $table->longText('description')->nullable();
            $table->integer('school_id')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('staff');
    }
}
