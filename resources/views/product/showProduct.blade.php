<x-app-layout>
  
  @include('layouts.header')
  
  <div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ Session::get('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  </div>

  <div class="row">

    @include('layouts.sidebar')

    <div class="col-md-9 mt-5">
      <div class="container">
        <div class="d-flex justify-content-center container mt-5">
          <div class="card p-3 bg-white"><i class="fa fa-apple"></i>
            <div class="about-product text-center mt-2"><img width="300px"
                src="{{asset('storage/'.$product->image_products)}}" class="border border-info rounded">
              <div>
                <h4>{{$product->name}}</h4>
              </div>
            </div>
            <div class="stats mt-2">
              <div class="d-flex justify-content-between p-price">
                <span>Descricao:</span><span>{{$product->description}}</span>
              </div>
              <div class="d-flex justify-content-between p-price"><span>Preco de
                  custo</span><span>{{$product->atCost}}</span>
              </div>
              <div class="d-flex justify-content-between p-price">
                <span>Preco de venda</span><span>{{$product->salesPrice}}</span>
              </div>
              <div class="d-flex justify-content-between p-price">
                <span>Quantidade</span><span>{{$product->quantity}}</span>
              </div>
            </div>
            <form action="{{ route('admin.destroy', $product->id)}}" method="POST" class="mt-5">
              @method('DELETE')
              @csrf
              <button type='submit' class="btn btn-secondary btn-lg btn-sm mt-5" role="button" aria-pressed="true"
                style="width:100%;">Deletar</button>
            </form><br>
            <a class="btn btn-secondary btn-lg btn-sm active" role="button" aria-pressed="true"
              href="{{route('admin.product.edit', $product->id)}}">Editar</a><br />
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>