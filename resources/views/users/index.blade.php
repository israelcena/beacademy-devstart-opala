@extends('template.users')
@section('title', 'Bem vindo ao Shop')
@section('body')
<div class="container px-4 py-5" id="icon-grid">
    <h2 class="pb-2 border-bottom">Usuários do Sistema</h2>
    <div class="row row-cols-1 row-cols-lg-2 g-4 py-5">
      @foreach($users as $user)
      <div class="col d-flex align-items-start gap-4">
        <img width="75px" src="https://cdn-icons-png.flaticon.com/512/219/219986.png" alt="User {{ $user->name }} image">
        <div>
          <h4 class="fw-bold mb-0 border-bottom">{{ $user->name }}</h4>
          <p>
          CPF: {{$user->cpf}}<br/>
          Data de Nascimento: {{$user->birth_date}}<br/>
          Endereço: {{$user->place}}<br/>
          Telefone: {{$user->phone}}<br/>
          E-mail: {{$user->email}}<br/>
        </p>
        </div>
        <div class="d-flex flex-column gap-1">
          <h5>Ações:</h5>
          <a href="{{ route('users.showOne', $user->id) }}" class="btn btn-success btn-sm">Visualizar</a>
          <a class="btn btn-warning btn-sm">Editar</a>
          <a class="btn btn-danger btn-sm">Excluir</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection