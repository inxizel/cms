<?php

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::truncate();

        Module::create([
            'name'  =>  'layout'
        ]);

        Module::create([
            'name'  =>  'user'
        ]);

        Module::create([
            'name'  =>  'customer'
        ]);

        Module::create([
            'name'  =>  'module'
        ]);
    }
}
