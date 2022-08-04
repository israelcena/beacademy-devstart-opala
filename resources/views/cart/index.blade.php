<x-app-layout>
    
    @include('layouts.header')

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
            <div class="col-md-6 offset-md-3 mt-3">
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
                            @if (@!empty($cart))
                                <tr>
                                   @php
                                    $total = 0;
                                    foreach($cart as $item) {
                                        $total += ($item['quantity'] * $item['price']);
                                    }
                                    @endphp
                                    <td colspan="3" class="text-right fw-bold">Total</td>
                                    <td class="fw-bold">R$ @money($total)</td>
                                    <td></td>
                                </tr>
                            @endif
                    </table>
                </div>
            </div>
            <div class="container mb-5">
                <div class="row ">
                    <div class="col-md-6 offset-md-3 mb-5">

                        @if (@!empty($cart))
                        <div class="col-md-12 d-flex">
                            <a href="{{ route('home.index') }}" class="btn btn-success me-2">Continuar comprando</a>
                            
                            <a href="{{ route('order.checkout', $user) }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('form-checkout').submit();">Finalizar compra</a>
                            <form id="form-checkout" action="{{ route('order.checkout') }}"></form>
                        </div>
                        @endif
                    </div>
                    
                </div>
            </div>
    
        </div>
    </div>
    



</x-app-layout>