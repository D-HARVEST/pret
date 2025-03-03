<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::updateOrcreate(
            [
                "email" => 'admin@admin',
            ],
            [
                'name' => 'Administrateur',
                'email' => 'admin@admin',
                'password' => bcrypt('p@ssw0rd'),
            ]
        );
        $user = User::updateOrcreate(
            [
                "email" => 'test@test',
            ],
            [
                'name' => 'TEST POS',
                "email" => 'test@test',
                'password' => bcrypt('p@ssw0rd'),
            ]
        );

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        try {
            $admin->assignRole('Super-admin');
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
}
