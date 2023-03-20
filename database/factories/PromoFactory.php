<?php

namespace Database\Factories;

use App\Models\Promo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Promo::class;

    public function definition()
    {
        $discount_type = $this->faker->randomElement(['Persen', 'Nominal']);
        $discount_value = $discount_type == 'Persen' ? $this->faker->numberBetween(5, 50) : $this->faker->numberBetween(5000, 50000);
        $promoName = ucwords(trim(preg_replace('/\s+/', ' ', strtolower($this->faker->word()))));
        return [
            'promo_uid' => str()->uuid(),
            'promo_name' => $promoName,
            'promo_code' => $this->faker->unique()->bothify('PRM-########'),
            'promo_description' => $this->faker->paragraph(),
            'discount_type' => $discount_type,
            'discount_value' => $discount_value,
            'start_date' => Carbon::now()->addDays($this->faker->numberBetween(0, 7)),
            'end_date' => Carbon::now()->addDays($this->faker->numberBetween(7, 14)),
        ];
    }
}
