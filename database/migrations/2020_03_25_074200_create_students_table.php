<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
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
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->integer('grade_id')->unsigned();
            $table->integer('ethnicity_id')->unsigned();
            $table->text('address')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->enum('disability', ['No', 'Yes']);
            $table->enum('religion', ['Hindu', 'Christian', 'Buddhism', 'Islam', 'Other']);
            $table->date('DOB')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_email')->nullable();
            $table->integer('occupation_id')->unsigned();
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
        Schema::dropIfExists('students');
    }
}
