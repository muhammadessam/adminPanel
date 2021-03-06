<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills',function (Blueprint $table){
            $table->id();
            $table->string('pay_way')->default('cash');
            $table->string('status')->default('done');
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('brench_id');
            $table->foreign('emp_id')->on('employees')->references('id')
                ->onDelete('cascade');
            $table->foreign('brench_id')->on('brenches')->references('id')
                ->onDelete('cascade');
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
        Schema::dropIfExists('bills');
    }
}
