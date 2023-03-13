<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Visitor::class;

    public function definition()
    {
        $now = now();
        $user_agent = $this->faker->randomElement(['Chrome', 'Firefox', 'Safari', 'Opera']);

        return [
            'visitor_id' => md5($now->timestamp . $this->faker->ipv4),
            'ip_address' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent,
            'created_at' => $this->faker->dateTimeBetween($now->format('Y') . '-01-01', $now),
            'updated_at' => $now,
        ];
    }
}
