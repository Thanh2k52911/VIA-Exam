<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'store_name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->numerify('09########'),
            'password' => 'Test@1234', // dùng mutator để set password_hash
            'ward' => $this->faker->streetName,
            'district' => $this->faker->citySuffix,
            'city' => $this->faker->city,
            'agreed_policy' => true,
            'remember_token' => Str::random(10),
        ];
    }
}
