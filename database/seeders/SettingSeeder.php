<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::updateOrCreate(['key' => 'brand_name'], ['value' => 'Nabi design']);
        \App\Models\Setting::updateOrCreate(['key' => 'phone'], ['value' => '0919295123']);
        \App\Models\Setting::updateOrCreate(['key' => 'company_name'], ['value' => 'Công ty TNHH NABI SHOP']);
    }
}
