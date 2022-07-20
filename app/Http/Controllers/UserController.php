<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

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

    public function show($id)
    {
        $this->authorize('view', $this->model::find($id));
        $selectUser = $this->model::findOrFail($id);
    
        return view('users.show', compact('selectUser'));
    }

    public function showDetails($id)
    {
        $selectUser = $this->model::findOrFail($id);
    
        return view('users.show-details', compact('selectUser'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $req)
    {
        $newUser = $req->all();
        $newUser['password'] = bcrypt($req->password);
        $this->model->create($newUser);
        return redirect()->route('users.create')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit($id)
    {
        $selectUser = $this->model::findOrFail($id);

        return view('users.edit', compact('selectUser'));
    }

    public function update(StoreClientRequest $req, $id)
    {
        $selectUser = User::findOrFail($id);

        $selectUser['password'] = bcrypt($req->password);

        $selectUser->update($req->only([
                'name',
                'password',
                'birth_date',
                'phone',
                'place',
                'residence_number',
                'city',
                'district',
                'cep',
                'country',
        ]));
        return redirect()->route('users.show', $selectUser->id)->with('success', 'Usuário atualizado com sucesso!');
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
