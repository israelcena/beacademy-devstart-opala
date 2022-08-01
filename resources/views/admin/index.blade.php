<x-app-layout>
    <div>
        @include('layouts.header')
    </div>
    <div class="row">
        <div class="col-md-2 -lg bg-light h-100 min-vh-100 rounded">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10 d-flex align-items-center justify-content-center flex-column">
            <h1 class="fw-bold text-secondary">Bem vindo ao Painel Admin do Sistema</h1>
            <hr>
            <h3 class="text-secondary">Selecione a categoria no menu ao lado</h3>
        </div>
    </div>


</x-app-layout>