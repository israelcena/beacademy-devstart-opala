<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(User $userModel)
    {
        $this->model = $userModel;
    }

    public function index()
    {
        $users = $this->model::all();
        return view('users.index', compact('users'));
    }
    public function showOne($id)
    {
        $selectUser = $this->model::find($id);
        if (!$selectUser) {
            return redirect()->route('users.index');
        }
        return view('users.showOne', compact('selectUser'));
    }
}
