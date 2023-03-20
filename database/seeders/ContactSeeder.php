<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        // Mengambil data provinsi, kota, dan kecamatan dari Indonesia
        $provinces = DB::table('provinces')->pluck('id');
        $cities = DB::table('regencies')->pluck('id');
        $districts = DB::table('districts')->pluck('id');

        // Memasukkan 50 data acak ke dalam tabel Contact
        for ($i = 0; $i < 1; $i++) {
            Contact::create([
                'province_id' => 32,
                'city_id' => 3278,
                'district_id' => 3278050,
                'shop_name' => "Khadijah Label",
                'email' => "khadijah_label@gmail.com",
                'address' => "Jl. HZ. Mustofa No.326, Tugujaya, Plaza Asia",
                'postal_code' => "46126",
                'phone' => "+62 811-2116-897",
                'tiktok' => "https://www.tiktok.com/@khadijahlabel/",
                'instagram' => "https://www.instagram.com/khadijahlabel/",
                'facebook' => "https://web.facebook.com/Khadijahlabel/",
                'shopee' => "https://shopee.co.id/pusat.busana.muslim",
                'tokped' => "https://www.tokopedia.com/khadijahlabel",
            ]);
        }
    }
}
