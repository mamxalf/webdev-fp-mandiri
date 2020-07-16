<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 10; $i++){
            DB::table('items')->insert([
                'id_category' => $faker->randomElement($array = array (1, 2, 3, 4, 5)),
                'id_brand' => $faker->randomElement($array = array (1, 2, 3, 4, 5)),
                'name' => $faker->name,
                'code' => $faker->nik(),
                'price' => $faker->numberBetween($min = 1000, $max = 9000)
            ]);

        }
    }
}
