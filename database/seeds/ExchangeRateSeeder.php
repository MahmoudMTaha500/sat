<?php

use Illuminate\Database\Seeder;
use App\Models\ExchangeRate;

class ExchangeRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExchangeRate::create([
            "base_currency_code" => 'SAR',
            "currency_code" => 'GBP',
            "exchange_rates" => '0.22', 
        ]);

        ExchangeRate::create([
            "base_currency_code" => 'SAR',
            "currency_code" => 'EUR',
            "exchange_rates" => '0.23', 
        ]);

        ExchangeRate::create([
            "base_currency_code" => 'SAR',
            "currency_code" => 'USD',
            "exchange_rates" => '0', 
        ]);

        
    }
}
