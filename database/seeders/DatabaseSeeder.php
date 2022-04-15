<?php

namespace Database\Seeders;

use App\Models\KasKeluar;
use App\Models\KasMasuk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->count(5)->create();
        User::create([
            'name' => 'Fadli Insani',
            'username' => 'fadliinsan',
            'password' => bcrypt('admin'),
            'admin' => true
        ]);

        KasMasuk::factory(20)->create();

        KasKeluar::factory(20) -> create();
    }
}
