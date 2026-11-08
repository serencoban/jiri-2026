<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'name' => 'Portfolio',
            'description' => 'Portfolio personnel',
            'project_url' => 'https://example.com',
            'repo_url' => 'https://github.com/example/portfolio',
        ]);
    }
}
