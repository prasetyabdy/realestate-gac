<?php

use App\Models\Category;
use App\Models\Rumah;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rumahs', function (Blueprint $table) {
            $table->id();
            $table->string('namarumah');
            $table->foreignIdFor(Category::class);
            $table->string('tiperumah');
            $table->bigInteger('hargarumah');
            $table->text('alamatrumah');
            $table->text('deskripsirumah');
            $table->string('foto');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumahs');
    }
};
