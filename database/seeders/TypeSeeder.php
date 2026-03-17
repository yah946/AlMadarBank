<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::factory()->create([
            'name'=>'checking',
            'overdraft'=>500,
        ]);
        Type::factory()->create([
            'name'=>'saving',
            'overdraft'=>0,
        ]);
        Type::factory()->create([
            'name'=>'minor',
            'overdraft'=>0,
        ]);
        //'checking','saving','minor'
    }
}
