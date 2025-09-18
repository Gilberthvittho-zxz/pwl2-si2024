<?php

namespace App\Http\Controllers;

// import model Product
use App\Models\Product;

// import return type View
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return View
     */
  public function index()
{
    $products = Product::withCategorySupplier()->latest()->paginate(10);
    return view('products.index', compact('products'));
}

}
