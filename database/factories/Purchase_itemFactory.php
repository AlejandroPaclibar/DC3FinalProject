<?php

namespace Database\Factories;

use App\Models\Merchandise;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase_item>
 */
class Purchase_itemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merchandise_id'  => fake()->randomElement(Merchandise::pluck('id')),
            'purchase_id'     => fake()->randomElement(Purchase::pluck('id')),
            'whole_sale_qty'  => fake()->numberBetween(100,10000),
            'purchase_price'  => fake()->numberBetween(100,10000)
        ];
    }
}
