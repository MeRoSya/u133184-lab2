<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Address;
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
        Customer::factory(100)->create()
            ->each(function ($customer)
        {
            $addresses = Address::factory(rand(1, 4))->make();

            foreach ($addresses as $address)
            {
                $customer->address()->save($address);
            }
        });
    }
}
