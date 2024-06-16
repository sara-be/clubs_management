<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubSeeder extends Seeder
{
    public function run()
    {
        $clubs = [
            ['name' => 'Club Sportif', 'description' => 'Club Sportif Description', 'responsable_id' => 1],
            ['name' => 'Club SociCulturel', 'description' => 'Club SociCulturel Description', 'responsable_id' => 2],
            ['name' => 'Club Digital', 'description' => 'Club Digital Description', 'responsable_id' => 3],
            ['name' => 'Club SkillUP', 'description' => 'Club SkillUP Description', 'responsable_id' => 4],
            ['name' => 'Club Environnement', 'description' => 'Club Environnement Description', 'responsable_id' => 4],
        ];

        foreach ($clubs as $club) {
            Club::create($club);
        }
    }
}
