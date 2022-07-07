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
}
