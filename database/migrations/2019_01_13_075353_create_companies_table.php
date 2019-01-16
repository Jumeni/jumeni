<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->index();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('subdomain')->nullable();
            $table->bigInteger('phone1')->nullable();
            $table->bigInteger('phone2')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->json('location')->nullable();
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
        Schema::drop('companies');
    }
}
