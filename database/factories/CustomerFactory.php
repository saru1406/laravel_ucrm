<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'kana' => $this->faker->kanaName,
            'tel' => str_replace('-','',$this->faker->phoneNumber),
            'email' =>$this->faker->email,
            'postcode' => $this->faker->postcode,
            'address' => mb_substr($this->faker->address,9),
            'birthday' => $this->faker->dateTime,
            'gender' => $this->faker->numberBetween(0,2),
            'memo' => $this->faker->realText(50),
        ];
    }
}
