<x-app-layout>
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
        <div class="col-md-2 -lg bg-light min-vh-100 h-auto">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-9 h-100 text-center mt-5">
            @include('users.index')
        </div>
    </div>

</x-app-layout>