<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_applications', function (Blueprint $table) {
            $table->increments('id'); 
            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('job_id')->references('id')->on('tags');
            $table->string('status');   
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
        Schema::dropIfExists('control_applications');
    }
}
