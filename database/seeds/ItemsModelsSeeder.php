<?php

use Illuminate\Database\Seeder;

class ItemsModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Item::class, 40)->create()->each(function($item) {
            $item->addMedia(storage_path('111.png'))->preservingOriginal()->toMediaCollection('posters');
        });
    }
}
