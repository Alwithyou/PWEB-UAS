<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatCampingTable extends Migration
{
    public function up()
    {
        Schema::create('alat_camping', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price_per_day', 10, 2);
            $table->string('photo')->nullable();
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alat_camping');
    }
}
