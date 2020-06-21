<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateSettingsTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_trans', function (Blueprint $table) {
            $table->id();
            $table->longText('message');
            $table->string('lang_code');
            $table->unsignedBigInteger('setting_id');
            $table->foreign('lang_code')->references('lang_code')->on('langs')->onDelete('cascade');
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('settings_trans')->insert([
            ['message' => 'site is under maintenance', 'setting_id' => 1, 'lang_code' => 'en', 'created_at' => now(), 'updated_at' => now()],
            ['message' => 'الموقع تحت الاصلاح', 'setting_id' => 1, 'lang_code' => 'ar', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_trans');
    }
}
