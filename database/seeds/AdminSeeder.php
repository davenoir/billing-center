<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email'=>'admin@admin.com',
            'password' => Hash::make("admin123"),
            'api_token'=>Str::random(60),
            'role_id'=> 1,
        ]);
    }
}
