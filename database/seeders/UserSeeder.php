<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Khadija',
            'email' => 'khadija@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'responsable',
            'photo' => 'dqdSrvOyATzOYHd7q6kMuvo8M61EpehKW9pGIYDs.jpg',
            'phone' => '+212612345678',
        ]);
        User::create([
            'name' => 'Hajar',
            'email' => 'hajar@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'responsable',
            'photo' => 'R72JD5Cf1TykwARFhv1FprRISsWhA2sNJ8OvVQVo.jpg',
            'phone' => '+212612345678',
        ]);
        User::create([
            'name' => 'Ahmed',
            'email' => 'ahmed@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'responsable',
            'photo' => 'mjBjKE5WxZ8GutvAKMfqJPwQAlIxCGAkgaGqX9yj.jpg',
            'phone' => '+212612345678',
        ]);
    }
}
