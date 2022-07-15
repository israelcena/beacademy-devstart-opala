<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;


class AdminController extends Controller
{
    public function __construct(User $userModel)
    {
        $this->model = $userModel;
    }
    
    public function index()
    {
        return view('admin.index');
    }
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
