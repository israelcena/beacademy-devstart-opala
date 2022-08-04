<x-app-layout>

    @include('layouts.header')

    <div class="container-fluid">
        <div class="row">

            @include('layouts.sidebar')
            
            <div class="col-md-10 d-flex align-items-center justify-content-center flex-column bg-contrast">
                <h1 class="fw-bold">Bem vindo(a) à Área Administrativa do E-commerce "E aí, Docinho?"</h1>
                <hr>
                <h2 class="">Selecione a categoria no menu ao lado</h2>
            </div>
    
        </div>
    </div>

    @include('layouts.footer_admin')

</x-app-layout>