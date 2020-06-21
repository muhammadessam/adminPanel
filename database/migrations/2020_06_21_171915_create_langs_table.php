<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langs', function (Blueprint $table) {
            $table->string('lang_code')->unique()->primary();
            $table->timestamps();
        });

        DB::table('langs')->insert([
            [
                'lang_code' => 'en',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'lang_code' => 'ar',
                'created_at' => now(),
                'updated_at' => now(),

            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('langs');
    }
}
