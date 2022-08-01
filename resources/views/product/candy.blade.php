<x-app-layout>
    <div>
        @include('layouts.header')
    </div>

    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="container mt-5">
        <div class="row d-flex">
            <div class="col-md-12">
                <h1 class="text-center">Escolha os doces que desejar:</h1>

                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card -lg position-relative d-flex border-none" style="height: 38rem;">
                                <img src="{{ asset('storage/' . $product->image_products) }}" class="card-img-top img-fluid mx-auto mt-1" alt="{{ $product->name }}" style="max-width: 120px">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title" style="font-size: 1.8rem;">{{ $product->name }}</h5>
                                    <p class="card-text mt-auto">{{ $product->description }}</p>
                                    <p class="text-muted mt-auto">Valor: R$ {{ $product->salesPrice }}</p>
                                </div>
                                    <div class="card-footer bg-transparent mb-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            
                                                <a href="{{ route('products.showOne', $product->id) }}" class="btn btn-sm btn-outline-secondary">Ver detalhes</a>
                                                <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-sm btn-outline-secondary">Adicionar ao carrinho</a>
                                                
                                                {{-- <a href="{{ route('cart.add', $product->id) }}" class="btn btn-sm btn-outline-secondary" onclick="event.preventDefault(); document.getElementById('form-add').submit();">Adicionar ao carrinho</a>
                                                <form id="form-add" action="{{ route('cart.add', $product->id) }}" method="post" style="display: none">
                                                    @csrf
                                                </form> --}}
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</x-app-layout>