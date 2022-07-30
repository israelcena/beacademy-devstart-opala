<x-app-layout>
    <div>
        @include('layouts.navbar')
    </div>
    
    <div class="row">
      
        <div class="col-md-2 shadow min-vh-100">
          @include('components.sidebar-client')
        </div>
      
        <div class="col-md-10 h-auto">
            @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center container-fluid" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
             @endif
             
            <div class="container">
                <div class="row d-flex justify-content-center mt-5 mb-3">
                    <h2 class="text-center text-secondary">Detalhes do pedido {{ $selectOrder->id }}</h2>
                 </div>

                 <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor Unitário</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listItems as $orderItem)
                                    <tr>
                                        <td class="d-flex align-items-center"><img class="img-fluid me-3" src="{{ asset('/storage/' . $orderItem->image_products) }}" alt="Foto de {{ $orderItem->product->name }}" style="width: 50px"> {{ $orderItem->product->name }}</td>
                                        <td>{{ $orderItem->quantityItem }}</td>
                                        <td>{{ $orderItem->price }}</td>
                                        <td>{{ $orderItem->subtotal }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="bg-secondary">
                                    @php
                                     $total = 0;
                                     foreach($listItems as $orderItem) {
                                         $total += ($orderItem->quantityItem * $orderItem->price);
                                     }
                                     @endphp
                                     <td colspan="4" class="text-right text-light fw-bold">Total do pedido: R$ @money($total)</td>
                                 </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                
                    <div class="col-md-12 d-flex justify-content-center">
                        <div class="row">
                            <a href="{{ route('orders.historic', $selectUser->id) }}" class="btn btn-secondary d-block">
                                <i class="bi bi-arrow-left"></i>
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>


</x-app-layout>