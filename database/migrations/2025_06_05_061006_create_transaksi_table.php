<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('address');
            $table->string('identity_photo'); 
            $table->enum('status', ['pending', 'approved', 'rejected', 'menunggu_pembayaran', 'menunggu_pengambilan', 'disewa', 'returned']) ->default('pending');
            $table->timestamp('returned_at')->nullable();
            $table->text('notes')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }

}
