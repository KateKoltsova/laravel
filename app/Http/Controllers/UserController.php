<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function authorization(Request $request)
    {
        $login = $request->input('login');
        return redirect()->route('user.info', ['login' => $request->input('login'), 'message' => 'Authorizated user ' . $login]);
    }

    public function registration(Request $request)
    {
        $login = $request->input('login');
        return redirect()->route('user.info', ['login' => $login, 'message' => 'Registered user ' . $login]);
    }

    public function showUser($login, $message = null)
    {
        echo $message;
        echo '<h1>User ' . $login . ' info</h1>';
        echo '<form method="POST" action="' . route('user.delete') . '">
            <input type="hidden" name="_method" value="DELETE"> '
            . csrf_field()
            . '<input type="hidden" name="login" value="'
            . $login
            . '">
            <button type="submit">Delete</button>
        </form>';
    }

    public function delete(Request $request)
    {
        echo '<h1>Deleted user ' . $request->input('login') . '</h1>';
    }

    public function view()
    {
        return view('user-form');
    }
}

