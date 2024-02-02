<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    //$categories = Category::all();
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::all();
        $phone_no_before = $this->faker->phoneNumber();

        return [
            //
            'category_id' => $categories->random()->id,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->safeEmail(),
            'tel' => str_replace("-", "",$phone_no_before),
            'address' => $this->faker->prefecture().$this->faker->city().$this->faker->streetAddress(),
            'building' => $this->faker->company(),
            'detail' => $this->faker->realText(30),
        ];
    }
}
