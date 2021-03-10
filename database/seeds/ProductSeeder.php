<?php

use App\Invoice;
use App\Customer;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
        $invoices = Invoice::all();

        for($i=0; $i < 3; $i++) {
        foreach($invoices as $invoice) {
            DB::table('products')->insert([
                'desc'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
                'price'=>$faker->numberBetween($min = 10, $max = 99),
                'customer_id'=> $invoice->customer_id,
                'is_payed'=>$invoice->is_payed,
                'invoice_id'=> $invoice->id,
                'quantity'=>$faker->numberBetween($min = 1, $max = 5),
            ]);
        }
    }
    }
}

