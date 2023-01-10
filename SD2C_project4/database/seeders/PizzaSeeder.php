<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Funghi',
            'price_small' => '1.00',
            'price_medium' => '1.80',
            'price_large' => '2.20',
         
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Hawaii',
            'price_small' => '1.50',
            'price_medium' => '2.60',
            'price_large' => '3.20',
         
        ]);


        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Salami',
            'price_small' => '1.20',
            'price_medium' => '1.90',
            'price_large' => '2.70',
         
        ]);

    }
}
