<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->index();
            $table->bigInteger('transactional_id');
            $table->bigInteger('amount');
            $table->string('status');
            $table->string('method');
            $table->integer('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('app')->nullable();
            $table->string('doneBy')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('currency')->nullable();
            $table->bigInteger('customer_phone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
