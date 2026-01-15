<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Jemuel Abella',
                'email' => 'jemss1854@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Jessehr Tan',
                'email' => 'jessehrtan851@gmail.com',
                'password' => bcrypt('password'),
            ],
        [
                'name' => 'Patrick Benablo',
                'email' => 'patrickbenablo91@gmail.com',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }

        $this->command->info('Users seeded successfully!');
    }
}

