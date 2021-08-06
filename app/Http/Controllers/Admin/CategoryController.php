<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('admin.home');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(10);
        //dd($categories);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=>'required|string|min:2|max:255|unique:categories',
            'description'=>'required|string|min:2|max:999',
            'color'=>'required'
        ];

        $this->validate($request, $rule);

        $category=Category::create([
            'name'=>$request->input('name'),
            'slug'=>str_slug($request->get('name')),
            'description'=>$request->input('description'),
            'color'=>$request->input('color'),
        ]);

        return redirect()->route('home-cate'); 
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
        $category=Category::find($id);
        return view('admin.category.edit')->with('category', $category);
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
            'name'=>'required|string|min:2|max:50',
            'description'=>'required|string|min:2|max:999',
            'color'=>'required'
        ];

        $this->validate($request, $rule);
        $category=Category::findOrFail($id);

        $category->name=$request->input('name');
        $category->slug=str_slug($request->get('name'));
        $category->description=$request->input('description');
        $category->color=$request->input('color');

        if (!$category->isClean()) {
            $category->save();
        }

        return redirect()->route('home-cate',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->route('home-cate');
    }
}
