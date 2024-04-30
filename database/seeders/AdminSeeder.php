<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MyuserModel;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MyuserModel::create([
            'name' => 'Taha',
            'email' => 'Taha@localhost',
            'password' => Hash::make('12345678'),
            'role' => 'Admin'
        ]);
    }
}
