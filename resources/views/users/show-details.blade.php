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

        <div class="col-md-2  min-vh-100  menu-sidebar-admin">
          @include('components.sidebar-client')
        </div>

        <div class="col-md-10">
            @include('components.user-details')
        </div>
      
    </div>
</x-app-layout>