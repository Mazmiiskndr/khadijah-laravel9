<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippingDetail>
 */
class ShippingDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Instantiate the RajaOngkirService by resolving it out of the service container.
        $rajaOngkirService = app(\App\Services\ApiRajaOngkir\ApiRajaOngkirService::class);

        // Use the getProvinces method on the RajaOngkirService to retrieve a list of provinces.
        $provinces = $rajaOngkirService->getProvinces();

        // Randomly select a province from the list of provinces.
        $province = $provinces[array_rand($provinces)];

        // Use the getCities method on the RajaOngkirService, pass in the id of the randomly selected province, to retrieve a list of cities in that province.
        $cities = $rajaOngkirService->getCities($province['province_id']);

        // Randomly select a city from the list of cities.
        $city = $cities[array_rand($cities)];

        $couriers = $rajaOngkirService->getCouriers();
        $courierKeys = array_keys($couriers);

        $courierKey = $courierKeys[array_rand($courierKeys)];

        // Fetch the parcels for the selected courier.
        $contactData = app('contactData');

        // Use the getCostParcel method on the RajaOngkirService to retrieve the cost of sending parcels.
        $parcels = $rajaOngkirService->getCostParcel($contactData, $city['city_id'], $this->faker->numberBetween(50, 500), $courierKey);

        $parcel = !empty($parcels) ? $parcels[array_rand($parcels)] : '';
        $parcelService = !empty($parcel) ? $parcel['service'] ?? '' : '';

        // Update the delivery cost with the cost from the selected parcel.
        $deliveryCost = !empty($parcel) ? $parcel['cost'][0]['value'] ?? 0 : 0;

        return [
            'order_id' => null, // This will be filled in when creating the ShippingDetail in the seeder
            'tracking_number' => null,
            'expedition' => $courierKey,
            'parcel' => $parcelService,
            'delivery_cost' => $deliveryCost,
            'weight' => $this->faker->numberBetween(50, 500),
        ];
    }
}
