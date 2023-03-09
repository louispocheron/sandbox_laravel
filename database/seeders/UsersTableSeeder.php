<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        foreach($users as $user){
            $postCount = rand(1, 5);

            posts::factory($postCount)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
