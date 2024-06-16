<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'annee' => $this->faker->randomElement(['1ere annee', '2eme annee']),
            'filiere' => $this->faker->randomElement(['développement', 'infrastructure', 'wfs', 'mobile', 'cloud', 'réseaux']),
            'club_id' => Club::inRandomOrder()->first()->id, // This will be overwritten in the seeder
        ];
    }
}
