<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffClassSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_class_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned();
            $table->integer('grade_id')->unsigned();
            $table->integer('subject_id')->unsigned();
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
        Schema::dropIfExists('staff_class_subjects');
    }
}
