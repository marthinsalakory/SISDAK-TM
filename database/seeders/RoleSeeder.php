<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Role $role): void
    {
        $role->create([
            'id' => '1',
            'name' => 'Admin',
        ]);

        $role->create([
            'id' => '2',
            'name' => 'Dosen',
        ]);

        $role->create([
            'id' => '3',
            'name' => 'Asesor',
        ]);
    }
}
