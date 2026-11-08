<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'firstname' => 'Andrew',
            'lastname' => 'Garfield',
            'email' => 'andrew@example.com',
            'image' => 'andrew.jpg',
        ]);

        Contact::create([
            'firstname' => 'Seren',
            'lastname' => 'Coban',
            'email' => 'seren@example.com',
            'image' => 'cat1.jpg',
        ]);
    }
}
