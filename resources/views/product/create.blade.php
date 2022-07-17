@extends('template.users')
@section('title', 'Novo produto')
@section('body')

<h1 class="container">Novo Produto</h1>
<form action="{{route('products.store')}}" method="POST">
  @csrf
  <div class="container mb-3">
    <label for="name" class="form-label">Nome:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="nome do produto">
  </div>
  <div class="container mb-3">
    <label for="descritpion" class="form-label">Descricao:</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="descricao do produto">
  </div>
  <div class="container mb-3">
    <label for="value" class="form-label">Valor:</label>
    <input type="text" class="form-control" id="value" name="value" placeholder="valor do produto">
  </div>
  <div class="container mb-3">
    <label for="photo" class="form-label">Imagem:</label>
    <input type="text" class="form-control" id="photo" name="photo" placeholder="link imagem do produto">
  </div>
  <div class="container mb-3">
    <label for="quantity" class="form-label">Quantidade:</label>
    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="quantidade do produto">
  </div>
  <div class="container">
    <button type="submit" class="btn btn-primary btn-sm">Confirmar</button>
  </div>
</form>

@endsection