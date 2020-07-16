<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
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

        for($i = 1; $i <= 5; $i++){
            DB::table('brands')->insert([
                'name' => $faker->word
            ]);

        }
    }
}
