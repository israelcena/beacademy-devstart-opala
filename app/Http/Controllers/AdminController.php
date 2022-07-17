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
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.showUser', compact('user'));
    }
    public function update(StoreUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.users.showOne', $user->id);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Usuário excluído com sucesso!');
    }
}
