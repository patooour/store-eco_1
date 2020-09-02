<?php

use Illuminate\Database\Seeder;
use \App\Models\category;

class categoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(category::class,20)->create();
    }
}
