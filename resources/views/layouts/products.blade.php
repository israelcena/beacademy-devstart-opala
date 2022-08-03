<div class="container p-5">
    <div class="row">
        <div class="col-md-12 mt-5">

                @foreach($products as $product)

                    <div class="col-md-3 mb-3">

                        <div class="card -lg position-relative d-flex shadow">

                            <img src="{{ asset('storage/' . $product->image_products) }}" class="card-img-top img-fluid mx-auto mt-1" alt="{{ $product->name }}" style="max-width: 230px">
                            
                            <div class="card-body bg-transparent d-flex flex-column text-center">

                                <h2 class="card-title">{{ $product->name }}</h2>

                                <p class="text-muted">Preço: R$ {{ $product->salesPrice }}</p>

                                <a href="{{ route('cart.add', ['id' => $product->id]) }}" title="Adicionar ao Carrinho de Compras">
                                    <i class="bi bi-cart-plus"></i>
                                </a>

                            </div>
                            
                        </div>

                    </div>

                @endforeach
        </div>                           
    </div>                           
</div>