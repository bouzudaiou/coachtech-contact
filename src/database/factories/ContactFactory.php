<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => $this->faker->name(),
        'email' => $this->faker->safeEmail(),
        'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
        'content' => $this->faker->realText(200),
        'status' => fake()->randomElement(['未対応', '対応中', '対応済み']),
        ];
    }
}
