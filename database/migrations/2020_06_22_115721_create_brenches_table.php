<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrenchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brenches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->text('address');
            $table->string('manger_phone');
            $table->string('tax_number');
            $table->string('tax_image');
            $table->string('email');
            $table->string('long');
            $table->string('lat');
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
        Schema::dropIfExists('brenches');
    }
}
