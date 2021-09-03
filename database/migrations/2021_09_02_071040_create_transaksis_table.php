<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nomor');
            $table->unsignedBigInteger('asets_id');
            $table->string('jenis_perbaikan')->nullable();
            $table->string('tindakan_perbaikan')->nullable();
            $table->string('worker')->default('INTERNAL');
            $table->string('requestor')->nullable();
            $table->string('approver')->nullable();
            $table->string('followup_by')->nullable();
            $table->string('giver')->nullable();
            $table->string('receiver')->nullable();
            $table->unsignedBigInteger('users_id');
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
        Schema::dropIfExists('transaksis');
    }
}
