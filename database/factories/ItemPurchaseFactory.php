<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\Purchase;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemPurchase>
 */
class ItemPurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_id' => rand(1, Item::count()),
            'purchase_id' => rand(1, Purchase::count()),
            'quantity' => rand(1, 5)
        ];
    }
}
