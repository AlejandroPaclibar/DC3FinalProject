<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Merchandise;
use App\Models\Purchase;
use App\Models\Purchase_item;
use App\Models\SoldItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        $this->call(UserSeeder::class);
        $this->call(MerchandiseSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(PurchaseSeeder::class);
        $this->call(PurchaseitemSeeder::class);
        $this->call(SoldItemSeeder::class);
    }
}
