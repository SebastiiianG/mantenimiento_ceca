<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Provider\ar_EG\Person;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\TestStatus\Failure;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*$this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);*/

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            //AcademicAreaSeeder::class,
            BrandSeeder::class,
            DependencySeeder::class,
            ObjectSeeder::class,
            PersonSeeder::class,
            FailureSeeder::class,
        ]);

    }
}
