<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ReportingController extends Controller{
 
    public function index()
    {
        $products = Product::get();
        $suppliers = Supplier::get();
        return view('reports.productsExpiredReport', compact('products', 'suppliers'));
    }

}
