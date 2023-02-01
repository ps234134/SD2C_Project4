<?php

namespace Tests\Unit;

use App\Models\Pizza;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;


    public function testCalculatePriceSmall()
    {
        $pizza = new Pizza(
            [
                'base_price' => 10,
                'size' => 'Small',]
        );
        $calculated_price = $pizza->PizzaPrice('Small');

        $this->assertEquals(8, $calculated_price, 'Pizza price is not correct');
    }

    public function testCalculatePriceMedium()
    {
        $pizza = new Pizza(
            [
                'base_price' => 10,
                'size' => 'Medium',]
        );
        $calculated_price = $pizza->PizzaPrice('Medium');
        $this->assertEquals(10, $calculated_price, 'Pizza price is not correct');
    }

    public function testCalculatePriceLarge()
    {
        $pizza = new Pizza(
            [
                'base_price' => 10,
                'size' => 'Large',]
        );
        $calculated_price = $pizza->PizzaPrice('Large');
        $this->assertEquals(12, $calculated_price, 'Pizza price is not correct');
    }


}
