<?php

use App\Customer;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $customers = Customer::all();

        for($i=0; $i < 5; $i++) {
            foreach($customers as $customer) {
                DB::table('invoices')->insert([
                    'customer_id'=> $customer->id,
                    'created_at'=>$faker->dateTime,
                    'is_payed'=>$faker->boolean($chanceOfGettingTrue = 50),
                ]);
            }
        }
    }
}
