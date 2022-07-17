<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUserEditRequest;


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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function update(StoreUserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only([
                'name',
                'birth_date',
                'phone',
                'place',
                'residence_number',
                'city',
                'district',
                'cep',
                'country',
            ]));

        return redirect()->route('admin.user.show', $user->id)->with('success', 'Usuário atualizado com sucesso!');
    }
    // public function update(StoreUserRequest $request, $id)
    // {
    //     $user = User::find($id);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->save();
    //     return redirect()->route('admin.showUser', $user->id);
    // }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Usuário excluído com sucesso!');
    }
}
