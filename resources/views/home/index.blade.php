<x-guest-layout>

    @include('layouts.header')

    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    @include('layouts.products')
    @include('layouts.footer')

</x-guest-layout>