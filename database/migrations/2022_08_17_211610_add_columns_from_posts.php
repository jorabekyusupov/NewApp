<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title_uz')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->string('sub_title_en')->nullable();
            $table->string('sub_title_ru')->nullable();
            $table->string('sub_title_uz')->nullable();
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

        });
    }
};
