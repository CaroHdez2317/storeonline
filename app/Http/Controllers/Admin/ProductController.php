<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Foto;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::orderBy('id', 'asc')->list('name', 'id');
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rule=[
            'name' => 'required|string|min:2|max:50|unique:products',
            'description' => 'required|string|min:2|max:255',
            'extract' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|between:0,9999999999.99',
            'quantity'=> 'required',
            'foto' => 'image',
        ];

        $this->validate($request, $rule);

        $products=Product::create([
            'name'=>$request->get('name'),
            'slug'=>str_slug($request->get('name')),
            'description'=>$request->get('description'),
            'quantity'=>$request->get('quantity'),
            'extract'=>$request->get('extract'),
            'price'=>$request->get('price'),
            'category_id'=>$request->get('category_id'),
        ]);

        Foto::create([
            'ruta'=> $request -> foto-> store(''),
            'product_id' => $products->id,
        ]);

        return redirect()->route('index-produ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view ('admin.product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule=[
            'name' => 'required|string|min:2|max:50',
            'description' => 'required|string|min:2|max:255',
            'quantity'=> 'required',
            'extract' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|between:0,9999999999.99',
            'foto' => 'image'
        ];

        $this->validate($request, $rule);
        $products=Product::findOrfail($id);

        $products->name=$request->input('name');
        $products->slug=str_slug($request->get('name'));
        $products->description=$request->input('description');
        $products->quantity=$request->get('quantity');
        $products->extract=$request->input('extract');
        $products->price=$request->input('price');
        $products->category_id=$request->get('category_id');


        Foto::create([
            'ruta' => $request -> foto-> store(''),
            'product_id' => $products->id,
        ]);

        if(!$product->isClean()){
            $products->save();
        }

         return redirect()->route('index-produ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products=Product::findOrFail($id);
        $products->delete();
        return redirect()->route('index-produ');
    }
}
