<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = [
            'public/custom-img/avtars/300-1.jpg',
            'public/custom-img/avtars/300-2.jpg',
            'public/custom-img/avtars/300-3.jpg',
            'public/custom-img/avtars/300-4.jpg',
            'public/custom-img/avtars/300-5.jpg',
            'public/custom-img/avtars/300-6.jpg',
            'public/custom-img/avtars/300-7.jpg',
            'public/custom-img/avtars/300-8.jpg',
            'public/custom-img/avtars/300-9.jpg',
            'public/custom-img/avtars/300-10.jpg',
            'public/custom-img/avtars/300-11.jpg',
            'public/custom-img/avtars/300-12.jpg',
            'public/custom-img/avtars/300-13.jpg',
            'public/custom-img/avtars/300-14.jpg',
            'public/custom-img/avtars/300-15.jpg',
            'public/custom-img/avtars/300-16.jpg',
            'public/custom-img/avtars/300-17.jpg',
            'public/custom-img/avtars/300-18.jpg',
            'public/custom-img/avtars/300-19.jpg',
            'public/custom-img/avtars/300-20.jpg',
            'public/custom-img/avtars/300-21.jpg',
            'public/custom-img/avtars/300-22.jpg',
            'public/custom-img/avtars/300-23.jpg',
            'public/custom-img/avtars/300-24.jpg',
            'public/custom-img/avtars/300-25.jpg',
            'public/custom-img/avtars/300-26.jpg',
            'public/custom-img/avtars/300-27.jpg',
            'public/custom-img/avtars/300-28.jpg',
            'public/custom-img/avtars/300-29.jpg',
            'public/custom-img/avtars/300-30.jpg',
        ];
        return [
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'photo' => $images[array_rand($images)],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
