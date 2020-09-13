<?php

use Illuminate\Database\Seeder;
use \App\Models\category;

class subCategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(category::class,10)->create();
    }


}
