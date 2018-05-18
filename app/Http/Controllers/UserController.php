<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        //
        return view('user.index', ['data' => User::all()]);
    }

        public function store(Request $request)
    {
        //
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request['password']);
		$data->save();
		return redirect('user');
    }

    public function edit($id)
    {
        //
        $data = User::where('id', $id)->get();
		return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        //
        $data = User::where('id', $id)->first();
		$data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request['password']);
		$data->save();
		return redirect('user');
    }

    public function destroy($id)
    {
        //
        $data = User::where('id', $id)->first();
		$data->delete();
		return redirect('user');
    }
}
