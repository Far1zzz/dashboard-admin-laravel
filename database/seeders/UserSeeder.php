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
    public function run(): void
    {
        $users = [
            // [
            //     'name' => 'Diskominfo-SP',
            //     'email' => 'Admin.kominfo@gmail.com',
            //     'role' => 'kominfo',
            //     'password' => Hash::make('kominfo123')
            // ],
            // [
            //     'name' => 'Sekretariat Daerah',
            //     'email' => 'Admin.sekda@gmail.com',
            //     'role' => 'sekda',
            //     'password' => Hash::make('sekda123')
            // ],
            // [
            //     'name' => 'Bupati',
            //     'email' => 'Admin.bupati@gmail.com',
            //     'role' => 'bupati',
            //     'password' => Hash::make('bupati123')
            // ],
            [
                'name' => 'Admin Wakil Bupati',
                'email' => 'Admin.wabup@gmail.com',
                'role' => 'wabup',
                'password' => Hash::make('wabup123')
            ],

        ];
        foreach ($users as $key => $value) {
            User::create([
                'name' => $value['name'],
                'email' => $value['email'],
                'role' => $value['role'],
                'password' => $value['password']
            ]);
        }
    }
}
