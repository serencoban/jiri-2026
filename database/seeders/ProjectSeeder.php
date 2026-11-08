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
            'brief_url' => 'This is a brief of the current Project',
            'repo_url' => 'https://github.com/example/portfolio',
        ]);
    }
}
