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
            'base_price' => '13.00',
           
         
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Hawaii',
            'base_price' => '16.00',
         
        ]);


        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Salami',
            'base_price' => '11.00',
            
         
        ]);

    }
}
