<?php

use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\models\setting::setMany([
            'default_locale'=>'ar',
            'default_timezone'=>'Africa/cairo',
            'reviews_enabled'=>True,
            'auto_approve_reviews'=>True,
            'supported_currency'=>['USD','LE','SAP'],
            'default_currency'=>'USD',
            'store_email'=>'admin1998@admin.com',
            'search_engine'=>'mysql',
            'local_shipping_cost'=>0,
            'outer_shipping_cost'=>0,
            'free_shipping_cost'=>0,
            'translatable'=>[
                'store_name'=>'ecommerce store',
                'free_shipping_label'=>'freeShipping',
                'local_label'=>'local shipping',
                'outer_label'=>'outer shipping',
            ],
        ]);
    }
}
