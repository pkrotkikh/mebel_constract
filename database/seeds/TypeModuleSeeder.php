<?php

use Illuminate\Database\Seeder;

class TypeModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Нижние модули', 'Верхние модули'];
        foreach ($titles as $title) {
            $title = [
                'title' => $title,
            ];
            \App\Models\TypeModules::create($title);
        }
    }
}
