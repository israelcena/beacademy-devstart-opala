<x-app-layout>
    <div>
        @include('layouts.navbar')
    </div>
    <div class="container">
      
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="row">
      
        <div class="col-md-2 shadow min-vh-100 h-auto">
          @include('components.sidebar-client')
        </div>
      
        <div class="col-md-10 h-auto">
            <div class="row d-flex flex-column align-items-center justify-content-center h-100">
                <h1 class="text-center fw-bold text-secondary">
                    Bem vindo {{ $selectUser->name }}
                </h1>
                <hr>
                <h3 class="text-secondary text-center">
                   Acesse o menu ao lado
                </h3>
            </div>
    </div>
</x-app-layout>