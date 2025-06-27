<?php

namespace Database\Factories;

use App\Models\OtpRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class OtpRequestFactory extends Factory
{
    protected $model = OtpRequest::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // sẽ tự tạo user nếu chưa có
            'otp_code' => $this->faker->numerify('######'),
            'is_used' => false,
            'expires_at' => Carbon::now()->addMinutes(10),
        ];
    }
}
