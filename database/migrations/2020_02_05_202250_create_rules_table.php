<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('rules')) {
            Schema::create('rules', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsigneBigInteger('disease_id');
                $table->unsigneBigInteger('cause_id');
                $table->timestamps();

                $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');
                $table->foreign('cause_id')->references('id')->on('causes')->onDelete('cascade');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules');
    }
}
