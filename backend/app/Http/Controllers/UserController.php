<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        $response['users'] = $user;
        return response($response);
    }
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->email;
        $user->save();
        $response['status'] = 200;
        $response['message'] = 'User Created Successfully.';
        return response($response);

    }
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $response['message'] = 'No user Found';
        $response['status'] = 500;
        if (!$user) {
            return response($response);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = 'sdfsdfdsfsdf';
        $user->save();
        $response['status'] = 200;
        $response['message'] = 'User Edited Successfullly.';
        return response($response);
    }
    public function destroy(Request $request)
    {

        $user = User::find($request->id);
        $user->delete();
        $response['status'] = 200;
        $response['message'] = 'User Deleted Successfully';
        return response($response);

    }
}
