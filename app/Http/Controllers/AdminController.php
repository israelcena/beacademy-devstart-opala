<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
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
    public function users(Request $request)
    {
        $users = $this->model->getUsers(
            $request->search ?? '',
        );
    
        return view('admin.users', compact('users'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.showUser', compact('user'));
    }

    public function create_user()
    {
        return view('admin.createUser');
    }
    public function store(StoreUserRequest $request)
    {
        $user = $request->all();
        $user['password'] = bcrypt($request->password);
        $this->model->create($user);

        return redirect()->route('admin.users')->with('success', 'Usuário cadastrado com sucesso!');
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
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Usuário excluído com sucesso!');
    }


}