<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Faker\Provider\ar_EG\Internet;
use Faker\Provider\cs_CZ\DateTime;
use Faker\Provider\Lorem;
use Faker\UniqueGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $faker->addProvider(new Lorem($faker));
        $faker->addProvider(new Internet($faker));
        $faker->addProvider(new DateTime($faker));
        $faker->addProvider(new UniqueGenerator($faker));
        for ($i = 0; $i < 10; $i++) {
            $randomMonths = rand(0, 12); // Número aleatorio de meses entre 0 y 12
             $createdAt = Carbon::now()->subMonths($randomMonths);

            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt('password'),
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);
        }
    }
}
