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

</x-app-layout>