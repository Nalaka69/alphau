<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'first_name' => 'AlphaU',
            'last_name' => 'Radio',
            'email' => 'admin@test.com',
            'school' => 'NIE',
            'student_index' => '00001',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'is_active' => 'active',
        ];

        User::create($admin);

        $this->command->info('Admin seeded successfully');
    }
}
