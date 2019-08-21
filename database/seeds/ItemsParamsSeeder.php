<?php

use Illuminate\Database\Seeder;

class ItemsParamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ParamItem::class, 40)->create()->each(function($paramItem) {
        });
    }
}
