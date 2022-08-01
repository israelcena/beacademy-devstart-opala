<x-app-layout>
    <div>
        @include('layouts.navbar')
    </div>

    <div class="container mt-5 d-flex justify-content-center">
        @if(Session::has('success'))
        
           <div class="col-md-4">
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   {{ Session::get('success') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
           </div>

        @endif
    </div>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 bg-light p-5 shadow text-center">
                <h3 class="display-6">{{ $product->name }}</h3>
                <p class="lead">{{ $product->description }}</p>
                <figure>
                    <img class="mx-auto img-fluid rounded" src="{{ asset('storage/' . $product->image_products) }}" alt="{{ $product->name }}" style="max-width: 200px">
                </figure>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-sm btn-outline-secondary" onclick="event.preventDefault(); document.getElementById('form-add').submit();">Adicionar ao carrinho</a>
                        <form id="form-add" action="{{ route('cart.add', $product->id) }}" method="post" style="display: none">
                            @csrf
                        </form>
                    </div>
                    <small class="text-muted">R$ {{ $product->salesPrice }}</small>
            </div>
        </div>
    </div>



</x-app-layout>