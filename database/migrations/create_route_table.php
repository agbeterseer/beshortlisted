<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateRouteTable extends Migration
{
    /**
     * Run the migrations. post_contents
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('as');
            $table->string('uses');
            $table->string('link');
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
        Schema::drop('dynamic_routes');
    }
}