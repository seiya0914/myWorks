<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('location',function(Blueprint $table){
            $table->increments('id');
            $table->string('street',30);
            $table->string('suburb',30);
            $table->string('desc',100);
            $table->integer('zip');
            $table->double('lon');
            $table->timestamps();
        });

        Schema::create('vehicle',function(Blueprint $table){
            $table->increments('id');
            $table->string('rego',6);
            $table->string('make',15);
            $table->string('model',20);
            $table->integer('year');
            $table->string('transmission',9);
            $table->integer('seating');
            $table->integer('location')->unsigned();
            $table->integer('rate');
            $table->timestamps();
            $table->foreign('location')->references('id')->on('location')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('customer',function(Blueprint $table){
            $table->increments('id');
            $table->string('name',50);
            $table->integer('mob');
            $table->string('license',15);
            $table->string('email',30);
            $table->string('address',40);
            $table->timestamps();
        });

        Schema::create('fadType',function(BLueprint $table){
            $table->increments('id');
            $table->string('typename',30);
            $table->timestamps();
        });


        Schema::create('booking',function(Blueprint $table){
            $table->increments('id');
            $table->date('pickup');
            $table->date('return');
            $table->integer('customer')->unsigned();
            $table->timestamps();
            // $table->integer('fad')->unsigned();
            // $table->foreign('fad')->references('id')->on('fad')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer')->references('id')->on('customer')->onUpdate('cascade')->onDelete('cascade');
        });
        
        Schema::create('fad',function(BLueprint $table){
            $table->increments('id');
            $table->string('desc',100);
            $table->integer('type')->unsigned();
            $table->integer('booking')->unsigned();
            $table->timestamps();
            $table->foreign('type')->references('id')->on('fadType')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('booking')->references('id')->on('booking')->onUpdate('cascade')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicle');
        Schema::drop('location');
        Schema::drop('rate');
        Schema::drop('booking');
        Schema::drop('fad');
        Schema::drop('customer');
        Schema::drop('fadType');
    }
}
