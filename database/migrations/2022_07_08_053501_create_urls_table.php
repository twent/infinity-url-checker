<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->tinyText('url_address')->index()->unique();
            $table->unsignedTinyInteger('frequency'); // Интервал проверки
            $table->unsignedTinyInteger('fail_repeat_count'); // Кол-во повторов при ошибке
            $table->unsignedBigInteger('attempts')->default(0); // Кол-во попыток
            $table->unsignedTinyInteger('fails')->default(0); // Кол-во ошибок
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
        Schema::dropIfExists('links');
    }
};
