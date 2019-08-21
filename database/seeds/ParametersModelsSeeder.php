<?php

use Illuminate\Database\Seeder;

class ParametersModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Parameter::class, 40)->create()->each(function($param) {
            $param->addMedia(storage_path('111.png'))->preservingOriginal()->toMediaCollection('posters');
        });
    }
}
