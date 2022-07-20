@extends('template.users')
@section('title', "Editando {{$product->name}}")
@section('body')

<div class="d-flex justify-content-center container mt-5">
  <div class="card p-3 bg-white"><i class="fa fa-apple"></i>
    <div class="about-product text-center mt-2"><img src='{{$product->photo}}' width="300"
        class="border border-info rounded">
      <div>
        <h4>{{$product->name}}</h4>
      </div>
    </div>
    <div class="stats mt-2">
      <div class="d-flex justify-content-between p-price">
        <span>Descricao:</span><span>{{$product->description}}</span>
      </div>
      <div class="d-flex justify-content-between p-price"><span>Valor</span><span>{{$product->value}}</span></div>
      <div class="d-flex justify-content-between p-price"><span>Quantidade</span><span>{{$product->quantity}}</span>
      </div>
    </div>
    <hr>
    <a class="btn btn-secondary btn-lg btn-sm active" role="button" aria-pressed="true" href="#">Editar</a><br />
    <a class="btn btn-secondary btn-lg btn-sm active" role="button" aria-pressed="true" href="#">Excluir</a><br />
    <a class="btn btn-secondary btn-lg btn-sm active" role="button" aria-pressed="true"
      href="/admin/produtos">Voltar</a>
  </div>
</div>






<!--<div class="container">
  <h4 class="fw-bold mb-0 border-bottom">teste</h4>
  <p>
    Nome: {{$product->name}}<br />
    Descricao: {{$product->description}}<br />
    Foto: <img width='100px' src='{{$product->photo}}'><br />
    Valor: {{$product->value}}<br />
    Quantidade: {{$product->quantity}}<br />
  </p>
  <a class="btn btn-primary" href="/admin/produtos">Voltar</a>
</div>-->
@endsection