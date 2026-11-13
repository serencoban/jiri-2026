<?php

namespace Database\Seeders;

use App\EnumsAttendanceRole;
use App\Models\Contact;
use App\Models\Invitation;
use App\Models\Jiri;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $this->call([
//            JiriSeeder::class,
//            ContactSeeder::class,
//            ProjectSeeder::class,
//        ]);
        $myriam = User::factory()->create([
            'firstname' => 'Myriam',
            'lastname' => 'Dupont',
            'email' => 'm@d.com',
        ]);
        $jiriMyriamNames = [
            'Design Web - Juin 2027',
            'Design Web - Aout 2026',
            'Design Web - Juin 2026',
            'Design Web - Aout 2025',
            'Design Web - Juin 2025',
        ];
        foreach ($jiriMyriamNames as $name) {
            Jiri::factory()->create([
                'name' => $name,
                'user_id' => $myriam->id,
            ]);
        }

        $dominique = User::factory()->create([
            'firstname' => 'Dominique',
            'lastname' => 'Vilain',
            'email' => 'd@v.com',
        ]);
        $jiriDominiqueNames = [
            'Projet Web - Juin 2027',
            'Projet Web - Aout 2026',
            'Projet Web - Juin 2026',
            'Projet Web - Aout 2025',
            'Projet Web - Juin 2025',
        ];
        foreach ($jiriDominiqueNames as $name) {
            Jiri::factory()->create([
                'name' => $name,
                'user_id' => $dominique->id,
            ]);
        }

        $contacts = Contact::factory(20)->create();

        $myriamsJiri = $myriam->jiris()->first();
        $domsJiri = $dominique->jiris()->first();

        $myriamsJiri->contacts()->attach($contacts[1]->id, ['role' => EnumsAttendanceRole::Evaluated->value,]);
        $myriamsJiri->contacts()->attach($contacts[2]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $myriamsJiri->contacts()->attach($contacts[3]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $myriamsJiri->contacts()->attach($contacts[4]->id, ['role' => EnumsAttendanceRole::Evaluated->value,]);
        $myriamsJiri->contacts()->attach($contacts[5]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $myriamsJiri->contacts()->attach($contacts[11]->id, ['role' => EnumsAttendanceRole::Evaluated->value,]);
        $myriamsJiri->contacts()->attach($contacts[12]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $myriamsJiri->contacts()->attach($contacts[13]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $myriamsJiri->contacts()->attach($contacts[14]->id, ['role' => EnumsAttendanceRole::Evaluated->value,]);
        $myriamsJiri->contacts()->attach($contacts[15]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $domsJiri->contacts()->attach($contacts[6]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $domsJiri->contacts()->attach($contacts[7]->id, ['role' => EnumsAttendanceRole::Evaluated->value,]);
        $domsJiri->contacts()->attach($contacts[8]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $domsJiri->contacts()->attach($contacts[9]->id, ['role' => EnumsAttendanceRole::Evaluated->value,]);
        $domsJiri->contacts()->attach($contacts[10]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $domsJiri->contacts()->attach($contacts[16]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $domsJiri->contacts()->attach($contacts[17]->id, ['role' => EnumsAttendanceRole::Evaluated->value,]);
        $domsJiri->contacts()->attach($contacts[18]->id, ['role' => EnumsAttendanceRole::Evaluator->value,]);
        $domsJiri->contacts()->attach($contacts[19]->id, ['role' => EnumsAttendanceRole::Evaluated->value,]);


        Project::factory(10)->create();
        //Task::factory(6)->create();
        Invitation::factory(2)->create();
    }

}
