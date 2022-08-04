<x-app-layout>
    
    @include('layouts.header')
    
    {{-- <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div> --}}
    
    <div class="row">
        
        @include('layouts.sidebar')

        <div class="col-md-9 h-100 text-center mt-5 bg-contrast">
            @include('users.index')
        </div>
    </div>

</x-app-layout>