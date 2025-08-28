<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'nom' => 'employe', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'nom' => 'prestataire', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'nom' => 'admin_fonctionnel', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'nom' => 'admin_dsi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
