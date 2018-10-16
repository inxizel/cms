<?php

use Illuminate\Database\Seeder;
use App\Models\OptionValue;

class OptionValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OptionValue::truncate();

        OptionValue::create([
            'option_id' =>  1,
            'name'  =>  'Chức năng',
            'value' =>  0
        ]);

        OptionValue::create([
            'option_id' =>  1,
            'name'  =>  'Quản lý',
            'value' =>  0
        ]);

        OptionValue::create([
            'option_id' =>  1,
            'name'  =>  'Công cụ',
            'value' =>  0
        ]);
    }
}
