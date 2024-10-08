<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\AppUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user) {
            AppUser::factory()->create([
                'app_id'  => App::inRandomOrder()->value('id'),
                'user_id' => $user->id,
            ]);
        });
    }
}
