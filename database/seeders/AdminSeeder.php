<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\facades\hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'adminid'=>'1300194',
            'name'=>'Admin',
            'username'=>'admin',
            'email'=>'sherjun123@gmail.com',
            'password'=>hash::make('12345')
        ]);
    }
}
