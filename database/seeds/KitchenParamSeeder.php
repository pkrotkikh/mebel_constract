<?php

use Illuminate\Database\Seeder;

class KitchenParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\KitchenParam::class, 10)->create()->each(function($user) {
        });
    }
}
