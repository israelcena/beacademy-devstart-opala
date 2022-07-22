@extends('template.users')
@section('title', "Produto {$product->name}")
@section('body')

<!---------------------------------------------------------------------------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!---------------------------------------------------------------------------->

<style>
.get-in-touch {
  max-width: 800px;
  margin: 50px auto;
  position: relative;

}

.get-in-touch .title {
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 3.2em;
  line-height: 48px;
  padding-bottom: 48px;
  color: #5543ca;
  background: #5543ca;
  background: -moz-linear-gradient(left, #f4524d 0%, #5543ca 100%) !important;
  background: -webkit-linear-gradient(left, #f4524d 0%, #5543ca 100%) !important;
  background: linear-gradient(to right, #f4524d 0%, #5543ca 100%) !important;
  -webkit-background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
}

.contact-form .form-field {
  position: relative;
  margin: 32px 0;
}

.contact-form .input-text {
  display: block;
  width: 100%;
  height: 36px;
  border-width: 0 0 2px 0;
  border-color: #5543ca;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
}

.contact-form .input-text:focus {
  outline: none;
}

.contact-form .input-text:focus+.label,
.contact-form .input-text.not-empty+.label {
  -webkit-transform: translateY(-24px);
  transform: translateY(-24px);
}

.contact-form .label {
  position: absolute;
  left: 20px;
  bottom: 11px;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
  color: #5543ca;
  cursor: text;
  transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
  transition: transform .2s ease-in-out,
    -webkit-transform .2s ease-in-out;
}

.contact-form .submit-btn {
  display: inline-block;
  background-color: #000;
  background-image: linear-gradient(125deg, #a72879, #064497);
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 16px;
  padding: 8px 16px;
  border: none;
  width: 200px;
  cursor: pointer;
}
</style>


<section class="get-in-touch">
  <h1 class="title">Produto {{$product->name}}</h1>
  <form class="contact-form row" action="{{route('admin.products.update', $product->id )}}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-field col-lg-6">
      <input id="name" name="name" class="input-text js-input" type="text" value={{$product->name}} required>
      <label class="label" for="name">Nome</label>
    </div>
    <div class="form-field col-lg-6 ">
      <input id="value" name="value" class="input-text js-input" type="number" step="0.01" min="0"
        value={{ $product->value }} required>
      <label class="label" for="value">Valor</label>
    </div>
    <div class="form-field col-lg-6 ">
      <input id="photo" name="photo" class="input-text js-input" type="text" value={{$product->photo}} required>
      <label class="label" for="photo">Link da Imagem</label>
    </div>
    <div class="form-field col-lg-6 ">
      <input id="quantity" name="quantity" class="input-text js-input" type="number" value={{$product->quantity}}
        required>
      <label class="label" for="quantity">Quantidade</label>
    </div>
    <div class="form-field col-lg-12">
      <input id="description" name="description" class="input-text js-input" type="text" value={{$product->description}}
        required>
      <label class="label" for="description">Descricao</label>
    </div>
    <div class="form-field col-lg-12 d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="submit" class="submit-btn">Atualizar</button>
    </div>
  </form>
</section>

@endsection


<!--<h1 class="container">Novo Produto</h1>
<form action="{{route('admin.products.store')}}" method="POST">
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
    <button type="submit" class="btn btn-success btn-sm">Confirmar</button>
    <a class="btn btn-primary btn-sm" role="button" aria-pressed="true" href="/admin/produtos">Voltar</a>
  </div>
</form>-->