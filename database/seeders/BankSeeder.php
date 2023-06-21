<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 1; $i++) {
            Bank::create([
                'bank_uid' => str()->uuid(),
                'provider' => "MANDIRI",
                'rekening_name' => "MOCH AZMI ISKANDAR",
                'rekening_number' => "1770006605478",
            ]);
        }
    }
}
