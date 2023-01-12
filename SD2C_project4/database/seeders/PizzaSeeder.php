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
            'img' => 'https://i0.wp.com/marielleindekeuken.nl/wp-content/uploads/2016/10/pizza-funghi.jpg?resize=800%2C530&ssl=1"'


        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Hawaii',
            'base_price' => '16.00',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqPZ0aVKOJaqGWa9YB0HesAa8nm_5r7efXEw&usqp=CAU'

        ]);


        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Salami',
            'base_price' => '11.00',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqPZ0aVKOJaqGWa9YB0HesAa8nm_5r7efXEw&usqp=CAU'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Tonno',
            'base_price' => '15.00',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMM3xhavaA0bC5tk4YzxzFr1ZxQD5ycEebog&usqp=CAU'
        ]);
        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Hot&Spicy',
            'base_price' => '14.00',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi5Y7DtZSG4EjS2fTMu2BXtwhqC1Hv0v3ISkcPf6dXKT8JjNn63xtNl9tP06hNCSgykCI&usqp=CAU'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Vegetariana',
            'base_price' => '12.00',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqPZ0aVKOJaqGWa9YB0HesAa8nm_5r7efXEw&usqp=CAU'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Quattro Stagioni',
            'base_price' => '17.00',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqPZ0aVKOJaqGWa9YB0HesAa8nm_5r7efXEw&usqp=CAU'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Quattro Formaggi',
            'base_price' => '18.00',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqPZ0aVKOJaqGWa9YB0HesAa8nm_5r7efXEw&usqp=CAU'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Margherita',
            'base_price' => '10.00',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqPZ0aVKOJaqGWa9YB0HesAa8nm_5r7efXEw&usqp=CAU'
        ]);

        DB::table('pizzas')->insert([
            'pizza_name' => 'Pizza Capricciosa',
            'base_price' => '15.00',
            'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqPZ0aVKOJaqGWa9YB0HesAa8nm_5r7efXEw&usqp=CAU'
        ]);



    }
}
