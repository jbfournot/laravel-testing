<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product as ProductRessource;
use Illuminate\Http\Request;

class ProductsController extends Controller{
 
    public function index()
    {
        return ProductRessource::collection(
            Product::paginate(25)
        );
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->only(Product::FIELDS_FILLABLE));
        return new ProductRessource($product);
    }

    public function show(Product $product)
    {
        return new ProductRessource($product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->forceFill($request->only(Product::FIELDS_FILLABLE));
        return new ProductRessource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
