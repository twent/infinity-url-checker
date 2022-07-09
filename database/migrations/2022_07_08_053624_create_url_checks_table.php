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
        Schema::create('url_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('url_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade'); // Связь со ссылкой
            $table->timestamp('executed_at'); // Дата, время выполнения
            $table->boolean('success'); // Код ответа успешен?
            $table->unsignedSmallInteger('answer_http_code')->nullable(); // Код ответа
            $table->tinyText('error_message')->nullable();
            $table->unsignedBigInteger('attempt_number'); // Номер попытки
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
        Schema::dropIfExists('url_checks');
    }
};
