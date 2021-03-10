<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleSeeder::class);
         $this->call(AdminSeeder::class);
         $this->call(CustomerSeeder::class);
         $this->call(InvoiceSeeder::class);
         $this->call(ProductSeeder::class);
    }
}
