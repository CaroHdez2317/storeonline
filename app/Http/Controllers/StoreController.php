<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class StoreController extends Controller
{
    public function index()
    {
    	return view('store.index');
    }

    public function show($slug)
    {
    	$product = Product::where('slug', $slug)->first();
    	return view('store.show', compact('product'));
    }

    public function about()
    {
        return view('store.about');
    }

    public function searchCategory($name){

        $categories = Category::searchCategory($name)->first();
        $products = $categories->products;
        $products = Product::orderBy('id', 'asc')->paginate(12);

        return view('store.index', compact('products'));
    }
    
}