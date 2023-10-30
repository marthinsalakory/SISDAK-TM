<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        // Create Admin Start
        $user->create([
            'id' => 'admin',
            'nama' => 'Admin',
            'username' => 'admin',
            'role_id' => '1',
            'password' => Hash::make('admin'),
        ]);
        // Create Admin End

        // Create Dosen Start
        $user->create([
            'id' => 'dosen',
            'nama' => 'Dosen 1',
            'username' => 'dosen',
            'role_id' => '2',
            'password' => Hash::make('dosen'),
        ]);

        $user->create([
            'id' => '0013076802',
            'nama' => 'Nicolas Titahelu, ST., MT',
            'username' => '0013076802',
            'role_id' => '2',
            'password' => Hash::make('0013076802'),
        ]);

        $user->create([
            'id' => '0023116003',
            'nama' => 'Ir. Rikhardus Ufie, MT',
            'username' => '0023116003',
            'role_id' => '2',
            'password' => Hash::make('0023116003'),
        ]);

        $user->create([
            'id' => '0009087211',
            'nama' => 'Wulfilla Maxmilian Rumaherang, ST., MSc., Ph.D',
            'username' => '0009087211',
            'role_id' => '2',
            'password' => Hash::make('0009087211'),
        ]);

        $user->create([
            'id' => '0009016601',
            'nama' => 'Samy Junus Litiloly, S.Si. MT',
            'username' => '0009016601',
            'role_id' => '2',
            'password' => Hash::make('0009016601'),
        ]);

        $user->create([
            'id' => '0030048607',
            'nama' => 'Cendy Sophia Edwina Tupamahu, ST., MT',
            'username' => '0030048607',
            'role_id' => '2',
            'password' => Hash::make('0030048607'),
        ]);

        $user->create([
            'id' => '0025076904',
            'nama' => 'Ir. Antoni Simanjuntak, MT',
            'username' => '0025076904',
            'role_id' => '2',
            'password' => Hash::make('0025076904'),
        ]);

        $user->create([
            'id' => '0007066704',
            'nama' => 'Jonny Latuny, ST., M.Eng., Ph.D',
            'username' => '0007066704',
            'role_id' => '2',
            'password' => Hash::make('0007066704'),
        ]);

        $user->create([
            'id' => '0028016808',
            'nama' => 'Jandri Louhenapessy, ST., MT',
            'username' => '0028016808',
            'role_id' => '2',
            'password' => Hash::make('0028016808'),
        ]);

        $user->create([
            'id' => '0002057704',
            'nama' => 'Benjamin Golfin Tentua, ST., MT',
            'username' => '0002057704',
            'role_id' => '2',
            'password' => Hash::make('0002057704'),
        ]);

        $user->create([
            'id' => '0001069301',
            'nama' => 'Sefnath Josep Etwan Sarwuna, ST., MT',
            'username' => '0001069301',
            'role_id' => '2',
            'password' => Hash::make('0001069301'),
        ]);

        $user->create([
            'id' => '0009086411',
            'nama' => 'Ir. Willem Marthinus Eric Wattimena, MS.Eng',
            'username' => '0009086411',
            'role_id' => '2',
            'password' => Hash::make('0009086411'),
        ]);

        $user->create([
            'id' => '0011017904',
            'nama' => 'Arthur Yanny Leiwakabessy, ST., MT',
            'username' => '0011017904',
            'role_id' => '2',
            'password' => Hash::make('0011017904'),
        ]);
        // Create Dosen End

        // Create Asesor Start
        $user->create([
            'id' => 'asesor',
            'nama' => 'Asesor',
            'username' => 'asesor',
            'role_id' => '3',
            'password' => Hash::make('asesor'),
        ]);
        // Create Asesor End
    }
}
