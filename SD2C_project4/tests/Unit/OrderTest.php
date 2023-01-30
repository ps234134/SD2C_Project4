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
        $pizza = new Pizza();
        $pizza->base_price = 10;
        $pizza->size = 'Small';
        if($pizza->size == 'Small'){
            $pizza->calculated_price = $pizza->base_price * 0.8;
        }
        $this->getStatus($pizza);

        $this->assertEquals(8, $pizza->calculated_price);
    }

    public function testCalculatePriceMedium()
    {
        $pizza = new Pizza();
        $pizza->base_price = 10;
        $pizza->size = 'Medium';
        if($pizza->size == 'Medium'){
            $pizza->calculated_price = $pizza->base_price * 1;
        }
        $this->getStatus($pizza);

        $this->assertEquals(10, $pizza->calculated_price);
    }

    public function testCalculatePriceLarge()
    {
        $pizza = new Pizza();
        $pizza->base_price = 10;
        $pizza->size = 'Large';
        if($pizza->size == 'Large'){
            $pizza->calculated_price = $pizza->base_price * 1.2;
        }
        $this->getStatus($pizza);

        $this->assertEquals(12, $pizza->calculated_price);
    }


}
