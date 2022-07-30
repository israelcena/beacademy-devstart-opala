<x-app-layout>
  <link rel="stylesheet" href="/css/style.css">
  <div>
    @include('layouts.navbar')
  </div>
  {{-- <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  </div> --}}
  <div class="row">
    <div class="col-md-2 shadow-lg bg-light min-h-100">
      @include('layouts.sidebar')
    </div>
    <div class="col-md-10 vh-100 text-center mt-5">
      <div class="container">
        <h1 id="font" class="text-center fs-2">Listagem de produtos da loja</h1>
        <a href="/admin/produtos/novo" class="btn btn-sm btn-primary btn-lg active d-flex justify-content-start"
          style="width: 105px;" role="
          button" aria-pressed="true">Novo
          Produto</a>
        <hr>
        @include('product.alerts')
        <div class="row">
          <div class="col-md-15 text-start text-center">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Descricao</th>
                  <th scope="col">Preco de Custo</th>
                  <th scope="col">Preco de Venda</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Data cadastrado</th>
                  <th scope="col">Acoes</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr>
                  <th scope="row">{{ $product->id }}</th>
                  <td><img width="100px" height="100px" src="{{ asset('storage/' . $product->image_products)}}"
                      class="rounded mx-auto d-block"> </td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->atCost }}</td>
                  <td>{{ $product->salesPrice }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ date('d/m/Y H:i', strtotime($product->created_at)) }}</td>
                  <td><a href="{{route('admin.products.show', $product->id)}}"
                      class="btn btn-sm btn-primary btn-lg active" role="button" aria-pressed="true">Ver produto</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination justify-content-center">
              {{$products->links('pagination::bootstrap-5')}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>