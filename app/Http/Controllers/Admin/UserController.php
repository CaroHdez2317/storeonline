<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name'=>'required|string|min:2|max:255',
            'last_name'=>'required|string|min:2|max:255',
            'email'=>'required|string|min:11|max:255',
            'password'=>'required|string|min:8|max:64'
        ];

        $this->validate($request, $rule);

        $user=User::create([
            'name'=>$request->input('name'),
            'last_name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'type'=>$request->has('type') ? 1 : 0,
        ]);

        return redirect()->route('index-user'); 
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
        $user=User::find($id);
        return view('admin.user.edit')->with('user', $user);
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
            'name'=>'required|string|min:2|max:255',
            'last_name'=>'required|string|min:2|max:255',
            'email'=>'required|string|min:11|max:255'
        ];

        $this->validate($request, $rule);
        $user=User::findOrFail($id);

        $user->name=$request->get('name');
        $user->last_name=$request->get('last_name');
        $user->email=$request->get('email');
        $user->type=$request->has('type') ? 1 : 0;

        if(!$user->isClean()){
            $user->save();
        }

        return redirect()->route('index-user',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('index-user');
    }
}
