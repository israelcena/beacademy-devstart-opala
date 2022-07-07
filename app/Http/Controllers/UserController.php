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
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $req)
    {
        $newUser = $req->all();
        $newUser['password'] = bcrypt($req->password);
        $this->model->create($newUser);
        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
        $userForDelete = $this->model->find($id);
        if (!$userForDelete) {
            return redirect()->route('users.index');
        }
        $userForDelete->delete();
        return redirect()->route('users.index');
    }
}
