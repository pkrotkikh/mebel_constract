<?php

use Illuminate\Database\Seeder;

class AdditionComplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Addition::class, 40)->create()->each(function($addition) {
            $addition->addMedia(storage_path('111.png'))->preservingOriginal()->toMediaCollection('posters');
        });
    }
}
