<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
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
            DB::table('categories')->insert([
                'name' => $faker->userName
            ]);

        }
    }
}
