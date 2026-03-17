<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Test User',
            'last_name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call([
            TypeSeeder::class,
            RoleSeeder::class,
            AccountSeeder::class,
            DespositSeeder::class,
            InvitationSeeder::class,
            TransferSeeder::class,
            WithdrawSeeder::class
        ]);
    }
}
