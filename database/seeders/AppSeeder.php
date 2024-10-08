<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\AppSetting;
use App\Models\AppUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        App::factory()
            ->count(3)
            ->has(AppSetting::factory()->count(1), 'settings')
            ->create();
    }
}
