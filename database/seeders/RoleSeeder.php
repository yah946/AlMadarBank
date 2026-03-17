<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create([
            'name'=>'holder'
        ]);
        Role::factory()->create([
            'name'=>'guardian'
        ]);
        Role::factory()->create([
            'name'=>'minor'
        ]);
        //'holder','guardian','minor'
    }
}
