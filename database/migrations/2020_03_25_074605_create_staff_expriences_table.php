<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffExpriencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_expriences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned();
            $table->string('organization_name')->nullable();
            $table->string('job_title')->nullable();
            $table->text('job_location')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('staff_expriences');
    }
}
