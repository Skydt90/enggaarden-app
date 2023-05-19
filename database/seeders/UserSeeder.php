<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Dev
        User::factory()->developer()->create();

        # System admins
        User::factory()->superAdmin()->count(1)->create();
        User::factory()->admin()->count(2)->create();

        # Supporters
        User::factory()->supporter()->count(100)->create();
        User::factory()->supporterCompany()->count(100)->create();
    }
}
