<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestSupplierView extends TestCase
{
    
    public function testGetExpiredProductsForTheThirdSupplierFunction()
    {
        $response = $this->get('/');
        $productsExpiredForTheThirdSupplier = Product::whereDate('last_refresh_at', '<', now()->subMonth(1))->where('supplier_id', 3)->get();
        $response->assertSeeInOrder($productsExpiredForTheThirdSupplier->pluck('name')->toArray());
    }

    public function testGetNoneExpiredProductsForAllSupliersFunction()
    {
        $response = $this->get('/');
        $productsExpiredForTheThirdSupplier = Product::whereDate('last_refresh_at', '>=', now()->subMonth(1))->get();
        foreach($productsExpiredForTheThirdSupplier as $product):
            $response->assertDontSeeText($product->name);
        endforeach;
    }
    
}
