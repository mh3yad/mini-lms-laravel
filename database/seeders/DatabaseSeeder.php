<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);

        /** @var User $teacher */
        $teacher = User::factory()->teacher()->create();
        $student = User::factory()->student()->create();
        Course::factory(5)->create(['teacher_id' => $teacher->id]);

    }
}
