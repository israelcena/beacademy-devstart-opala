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

    <div class="container mt-5">
        <div class="row d-flex">
            <h1 class="text-center">Meu carrinho</h1>
            <div class="col-md-6 mt-3">
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
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço Unitário</th>
                                <th>Subtotal</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (@empty($cart))
                                <tr>
                                    <td colspan="5" class="text-center">Nenhum produto no carrinho</td>
                                </tr>
                            
                                @else
                            @foreach($cart as $key => $item)

                                <tr class="text-center align-middle">
                                    <td class="d-flex align-items-center"><img class="img-fluid me-3" src="{{ asset('storage/' . $item['photo'] ) }}" alt="{{ $item['name'] }}" style="width: 50px">  {{ $item['name'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>R$ @money($item['price'])</td>
                                    <td>R$  @money(($item['quantity']) * ($item['price']))</td>
                                   <td>
                                    {{-- @dd($key[all]) --}}
                                    <form action="{{ route('cart.remove', ['key' => $key]) }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                    </form>
                                    </td>
                                   
                                </tr>
                            @endforeach
                            @endif
                            <tr>
                                <td colspan="3" class="text-right fw-bold">Total</td>
                                <td class="fw-bold">R$ @money($total)</td>
                                <td></td>
                            </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6 mt-3">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center">Endereço de entrega</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nome</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Endereço</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Endereço">
                                        </div>
                                        <div class="form-group">
                                            <label for="number">Número</label>
                                            <input type="text" class="form-control" id="number" name="number" placeholder="Número">
                                        </div>
                                        <div class="form-group">
                                            <label for="neighborhood">Bairro</label>
                                            <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Bairro">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">Cidade</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade">
                                        </div>
                                        <div class="form-group">
                                            <label for="state">Estado</label>
                                            <input type="text" class="form-control" id="state" name="state" placeholder="Estado">
                                        </div>
                                        <div class="form-group">
                                            <label for="cep">CEP</label>
                                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Telefone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone">
                                        </div>
                                        <div class="form-group">
                                            <label for="observation">Observações</label>
                                            <textarea class="form-control" id="observation" name="observation" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Finalizar Compra</button>
                                        </div>

</x-app-layout>