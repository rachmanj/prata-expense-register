<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuels', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('fuel_type'); // solar/bensin/oli
            $table->foreignId('aset_id')->nullable();
            $table->integer('hm')->nullable();
            $table->integer('km')->nullable();
            $table->integer('qty');
            $table->string('remarks')->nullable();
            $table->string('operator')->nullable();
            $table->string('security')->nullable();
            $table->string('fuelman')->nullable();
            $table->foreignId('created_by');
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
        Schema::dropIfExists('fuels');
    }
}
