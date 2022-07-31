<x-app-layout>
    <div>
        @include('layouts.navbar')
    </div>

    <div class="container">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
        @endif
    </div>

    <div class="container mt-5 mb-3">
        <div class="row d-flex">
            <h1 class="text-center text-secondary fs-2">Finalizar Compra</h1>
            <p class="lead text-center text-secondary"><small>Hummm, já é quase seu!</small></p>
            <div class="col-md-12 mt-3">
                <div class="container">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="container">
                    @if(Session::has('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ Session::get('warning') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-6">
                
                            <h3 class="text-center fs-4 text-secondary">Dados do Cliente</h3>
                            <p class="small"><span class="text-danger">* </span>Se desejar alterar seus dados, clique no botão abaixo</p>
                            
                            <form action="#{{-- route('checkout.store') --}}" method="POST">
                                @csrf
                                <div class="row">
                                <div class="form-group mb-3 mb-3 col-md-12">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled>
                                </div>
                                <div class="form-group mb-3 col-md-8">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"  value="{{ $user->email }}" disabled>
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="phone">Telefone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"  value="{{ $user->phone }}" disabled>
                                </div>
                                <div class="form-group mb-3 col-md-8">
                                    <label for="place">Endereço</label>
                                    <input type="text" class="form-control" id="place" name="place"  value="{{ $user->place }}" disabled>
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="residence_number">Número</label>
                                    <input type="text" class="form-control" id="residence_number" name="residence_number"  value="{{ $user->residence_number }}" disabled>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="city">Cidade</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}" disabled>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="district">Estado</label>
                                    <input type="text" class="form-control" id="district" name="district" value="{{ $user->district }}" disabled>
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep" value="{{ $user->cep }}" disabled>
                                </div>
                                <div class="form-group mb-3 col-md-4">
                                    <label for="country">País</label>
                                    <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}" disabled>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar meus dados</a>
                                </div>
                            </div>
                </div>      
            </div>

            <div class="col-md-6">
                <h3 class="text-center text-secondary fs-4">Resumo da compra</h3>

                <div class="row mt-4">
                    <table class="table table-hover table-warning">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço Unitário</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $key => $item)

                                <tr class="text-center align-middle">
                                    <td class="d-flex align-items-center"><img class="img-fluid me-3" src="{{ asset('storage/' . $item['photo'] ) }}" alt="{{ $item['name'] }}" style="width: 50px">  {{ $item['name'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>R$ @money($item['price'])</td>
                                    <td>R$  @money(($item['quantity']) * ($item['price']))</td>                                   
                                </tr>
                            @endforeach
                            @if (@!empty($cart))
                                <tr>
                                   @php
                                    $total = 0;
                                    foreach($cart as $item) {
                                        $total += ($item['quantity'] * $item['price']);
                                    }
                                    @endphp
                                    <td colspan="3" class="text-right fw-bold">Total do pedido</td>
                                    <td class="fw-bold">R$ @money($total)</td>
                                    <td></td>
                                </tr>
                            @endif
                    </table>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3 class="text-center fs-4 text-secondary">Método de pagamento</h3>
                        <form action="{{ route('order.checkoutstore') }}" method="post">
                            @csrf
                            <div class="form-group mb-3 col-md-12">
                                <label for="payment">Método de pagamento</label>
                                <select class="form-control" id="payment" name="payment" required>
                                    <option value="">Selecione</option>
                                    <option value="Pix">Pix</option>
                                    <option value="Débito">Boleto</option>
                                    <option value="Dinheiro">Dinheiro</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-5">
                                <a href="{{ route('cart.index') }}" class="btn btn-primary btn-block">Voltar ao carrinho</a>
                                <button type="submit" class="btn btn-danger btn-block">Comprar</button>
                            </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>





</x-app-layout>