@extends('template.users')
@section('title', 'Shop - Criação de Usuário')
@section('body')
<div class="container mt-4">
<form class="row g-3" method="post" action="{{route('users.store')}}">
  @csrf
  <div class="col-md-12">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Mark">
  </div>
   <div class="col-md-12">
    <label for="cpf" class="form-label">Cpf</label>
    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="156.514.254-51">
  </div>
     <div class="col-md-12">
    <label for="birth_date" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" id="birth_date" name="birth_date">
  </div>
  <div class="col-md-12">
    <label for="country" class="form-label">País</label>
    <input type="text" class="form-control" id="country" name="country" placeholder="BR">
  </div>
   <div class="col-md-12">
    <label for="place" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="place" name="place" placeholder="Rua Allan Pedrosa, 76. Bc. 8 Ap. 36
Porto Mila do Leste - RJ">
  </div>
  <div class="col-md-12">
    <label for="district" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="district" name="district" placeholder="Saquarema">
  </div>
  <div class="col-md-12">
    <label for="residence_number" class="form-label">Numero</label>
    <input type="text" class="form-control" id="residence_number" name="residence_number" placeholder="casa 6554">
  </div>
  <div class="col-md-12">
    <label for="phone" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="+552126566554">
  </div>
  <div class="col-md-12">
    <label for="email" class="form-label">E-mail</label>
    <div class="input-group">
      <input type="email" class="form-control" id="email" name="email" placeholder="fulano@email.com.br" aria-describedby="email">
    </div>
  </div>
  <div class="col-md-12">
    <label for="password" class="form-label">Senha</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Cadastrar</button>
  </div>
</form>
</div>
@endsection