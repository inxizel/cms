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
            'name'  =>  'layout',
            'display_name'  =>  'layout',
            'module_category_id'    => 2
        ]);

        Module::create([
            'name'  =>  'user',
            'display_name'  =>  'user',
            'module_category_id'    =>  2
        ]);

        Module::create([
            'name'  =>  'customer',
            'display_name'  =>  'customer',
            'module_category_id'    =>  2
        ]);

        Module::create([
            'name'  =>  'module',
            'display_name'  =>  'module',
            'module_category_id'    =>  2
        ]);
    }
}
