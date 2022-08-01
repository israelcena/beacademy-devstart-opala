<x-guest-layout>
    <div>
        @include('layouts.header')
    </div>
    <div class="section-hero">
        <h1 class="text-center" style="line-height:center">Escolha os doces que desejar!</h1>
    </div>
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="container mt-5 show-produtos">
        @include('layouts.products')
    </div>

    <div>
        @include('layouts.footer')
    </div>
</x-guest-layout>