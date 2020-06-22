<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('nation');
            $table->string('job');
            $table->string('identity_number');
            $table->string('identity_img');
            $table->string('contract_img');
            $table->string('phone');
            $table->string('bank_account');
            $table->string('sex');
            $table->double('salary');
            $table->string('status')->default('stoned');
            $table->unsignedBigInteger('brench_id');
            $table->foreign('brench_id')->on('brenches')
                ->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
}
