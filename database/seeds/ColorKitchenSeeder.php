<?php

use Illuminate\Database\Seeder;

class ColorKitchenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Color::class, 40)->create()->each(function($color) {
            $color->addMedia(storage_path('111.png'))->preservingOriginal()->toMediaCollection('posters');
        });
    }
}
