<?php

use App\Models\Rumah;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Rumah::class);
            $table->string('no_identitas');
            $table->string('pekerjaan');
            $table->string('gaji');
            $table->enum('jenis_pembayaran', ['Cash', 'Cash Bertahap', 'KPR']);
            $table->timestamp('janji_temu');
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamp('tanggal_pembayaran')->nullable();
            $table->string('jml_pembayaran')->nullable();
            $table->boolean('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
