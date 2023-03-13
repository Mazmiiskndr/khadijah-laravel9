<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;
use Faker\Factory as FakerFactory;
use Faker\Provider\id_ID\Color as ColorProvider;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create('id_ID');
        $faker->addProvider(new ColorProvider($faker));

        $allColorNames = [];
        $maxRetries = 10000;

        do {
            $colorName = $faker->colorName();
            if (!in_array($colorName, $allColorNames)) {
                $allColorNames[] = $colorName;
            }
            $maxRetries--;
        } while ($maxRetries > 0 && count($allColorNames) < 200);

        $data = array_map(function ($colorName) {
            return [
                'color_name' => $colorName,
            ];
        }, $allColorNames);

        Color::insert($data);
    }
}
