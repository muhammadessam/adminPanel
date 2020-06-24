<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('sub_group_id')->nullable()->default(null);
            $table->text('name');
            $table->double('quantity');
            $table->enum('quantity_type', ['piece', 'Carton', 'grain']);
            $table->double('buying_price');
            $table->double('selling_price');
            $table->double('lower_price')->nullable()->default(null);
            $table->text('img')->nullable()->default(null);
            $table->date('expired_at')->nullable()->default(null);
            $table->unsignedBigInteger('bar_code');
            $table->boolean('can_sell_unavailable')->default(false);
            $table->unsignedBigInteger('branch_id');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('sub_group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('brenches')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
