<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $users = \App\User::where('name', 'LIKE', "%$filterKeyword%")
                        ->paginate(10);
        return view('users.index', ['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "email" => "required|email|unique:users"
          ])->validate();

        $user_baru = new \App\User;

        $user_baru->name = $request->get('name');
        $user_baru->email = $request->get('email');

        $user_baru->save();

        return redirect()->route('users.create')->with('status', 'Brhasil bos queeeee');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::findOrFail($id);
        return view('users.detail', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::findOrFail($id);
        return view('users.edit', ['user'=>$user]);
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
        \Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "email" => "required|email|unique:users"
          ])->validate();

        $user = \App\User::findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $user->save();

        return redirect()->route('users.edit', ['id' => $id])->with('status', 'berhasil Di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findorFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('delet', 'berhasil terdeelet');
    }
}
