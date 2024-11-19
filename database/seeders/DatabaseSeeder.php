<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear un usuario específico
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Crear múltiples proyectos asociados a este usuario
        Project::factory(10)->create([
            'user_id' => $user->id,
        ]);

        // Crear más usuarios con proyectos asociados
        User::factory(5)->has(
            Project::factory(3) // Cada usuario tiene 3 proyectos
        )->create();
    }
}
