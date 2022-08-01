<x-app-layout>
    <div>
        @include('layouts.navbar')
    </div>
    
    <div class="row">
      
        <div class="col-md-2  min-vh-100">
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
                    <h2 class="text-center text-secondary">Meus pedidos</h2>
                 </div>

                 <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listOrders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ date('d/m/Y H:i', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td class="text-center">@money($order->total)</td>
                                        <td class="text-center">
                                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">
                                                <i class="bi bi-eye"></i>
                                            Ver itens</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div>
             </div>
        </div>
    </div>

</x-app-layout>