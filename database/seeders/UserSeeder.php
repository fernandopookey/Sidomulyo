<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname'      => 'Admin Sidomulyo',
            'username'      => 'admin',
            'email'         => 'sidocvmulyo@gmail.com',
            'roles'         => 'ADMIN',
            'address'       => 'Salatiga',
            'phone_number'  => '080808',
            'password'      => Hash::make('1')
        ]);
    }
}
