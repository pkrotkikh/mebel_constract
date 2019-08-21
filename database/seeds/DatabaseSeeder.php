<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
//            UsersTableSeeder::class,
            KirchenModelTable::class,
            KitchenParamSeeder::class,
            ColorKitchenSeeder::class,
            AdditionComplateSeeder::class,
            TypeModuleSeeder::class,
            ParametersModelsSeeder::class,
            ItemsModelsSeeder::class,
            ItemsParamsSeeder::class,
//            ColorTablesSeeder::class
        ]);
    }
}
