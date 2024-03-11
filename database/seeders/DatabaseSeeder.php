<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Pesanan::create([
            'user_id' => 2,
            'rumah_id' => 1,
            'no_identitas' => '31277312',
            'pekerjaan' => 'Programmer',
            'gaji' => 40000000,
            'jenis_pembayaran' => 'Cash',
            'janji_temu' => now(),
        ]);

        $this->call(
            [
                // UserSeeder::class
            ]
        );
    }
}
