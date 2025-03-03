<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('permissions') as $permission) {
            if (Permission::where('name', $permission)->exists()) {
                continue;
            }
            Permission::create(['name' => $permission]);
        }
    }
}
