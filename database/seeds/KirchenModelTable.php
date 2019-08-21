<?php

use Illuminate\Database\Seeder;

class KirchenModelTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Кухня "FLAT"', 'Кухня "Amore Classic"', 'Кухня "Грация"', 'Кухня "MoDa"', 'Кухня "maXima"','Кухня "Alta"','Кухня "Mirror Gloss"',
            'Кухня "Альбина"' ,'Кухня "Колор-микс"', 'Кухня "Margo"'];
        foreach ($titles as $title) {
            $title = [
                'title' => $title,
                'price' => rand(3600, 6000),
            ];
            $kitchen = \App\Models\Kitchen_model::create($title);
            $kitchen ->addMedia(storage_path('111.png'))->preservingOriginal()->toMediaCollection('posters');
        }
    }
}
