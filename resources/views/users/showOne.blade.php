@extends('template.users')
@section('title', "Editando Usuário {$selectUser->name}")
@section('body')
<div class="container">
  <h4 class="fw-bold mb-0 border-bottom">{{ $selectUser->name }}</h4>
    <p>
    CPF: {{$selectUser->cpf}}<br/>
    Data de Nascimento: {{$selectUser->birth_date}}<br/>
    Endereço: {{$selectUser->place}}<br/>
    Telefone: {{$selectUser->phone}}<br/>
    E-mail: {{$selectUser->email}}<br/>
    </p>
    <a class="btn btn-primary" href="/">Voltar Para página inicial</a>
</div>
@endsection