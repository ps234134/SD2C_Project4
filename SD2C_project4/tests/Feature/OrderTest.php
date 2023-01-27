<?php

namespace Tests\Feature;

use App\Models\Pizza;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function Calculate_pizza_price()
    {
         // Arrange
         $pizza = new Pizza();
         $pizza->base_price = 10;

         // Act
         $price = $pizza->calculatePrice('Small');

         // Assert
         $this->assertEquals(8, $price);
    }
}
