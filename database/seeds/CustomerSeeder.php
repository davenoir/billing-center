<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i<30; $i++){
            DB::table('customers')->insert([
                'name' => $faker->name,
                'address' => $faker->address,
                'phone'=>$faker->phoneNumber,
                'email'=>$faker->safeEmail,

            ]);
        }

    }
}
