<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $clubs = Club::whereIn('name', [
            'Club Sportif', 
            'Club SociCulturel', 
            'Club Digital', 
            'Club SkillUP', 
            'Club Environnement'
        ])->get();

        if ($clubs->count() !== 5) {
            $this->command->error('Some clubs are missing from the database.');
            return;
        }

        $clubMembers = [
            'Club Sportif' => 170,
            'Club SociCulturel' => 160,
            'Club Digital' => 170,
            'Club SkillUP' => 80,
            'Club Environnement' => 40,
        ];

        foreach ($clubMembers as $clubName => $memberCount) {
            $club = $clubs->firstWhere('name', $clubName);
            if ($club) {
                Member::factory()->count($memberCount)->create(['club_id' => $club->id]);
            } else {
                $this->command->error("Club $clubName not found.");
            }
        }
    }
}
