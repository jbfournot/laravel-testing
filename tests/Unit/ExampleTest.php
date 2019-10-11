<?php

namespace Tests\Unit;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExerciceTest extends TestCase
{

    public function testQuantityAvailableFunction()
    {
        $product = Product::all()->random();
        $productsInCart = Cart::where('product_id', $product->id)->get();
        $this->assertEquals($product->qty_available, $product->qty - $productsInCart->count());
    }

    public function testExpiredScopeExistOnProductModelFunction()
    {
        $this->assertTrue(method_exists(new \App\Models\Product, 'scopeExpired'));
    }

    public function testGetExpiredProductsFunction()
    {
        $productsExpired = Product::whereDate('last_refresh_at','<', now()->subMonths(1));
        $this->assertEquals($productsExpired->count(), Product::expired()->count());
    }

    public function testProductViewExistFunction()
    {
        $this->assertFileExists(resource_path('views/suppliers/index.blade.php'));
    }

    public function testSuppliersControllerExistFunction()
    {
        $this->assertFileExists(app_path('Http/Controllers/SuppliersController.php'));
    }

    public function testIndexMethodExistFunction()
    {
        $this->assertTrue(method_exists(new \App\Http\Controllers\SuppliersController, 'index'));
    }

}
