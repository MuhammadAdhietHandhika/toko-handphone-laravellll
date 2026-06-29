<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat 1 akun
        User::create([
            'name'=>'Admin Myphone',
            'email'=>'admin@ip.com',
            'password'=>Hash::make('admin123'),
        ]);
    }
}
