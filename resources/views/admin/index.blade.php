<x-app-layout>

    @include('layouts.header')

    <div class="container-fluid">
        <div class="row">
    
            <div class="col-md-2 -lg h-100 min-vh-100 rounded bg-white">
                @include('layouts.sidebar')
            </div>
    
            <div class="col-md-10 d-flex align-items-center justify-content-center flex-column">
                <h1 class="fw-bold text-secondary">Bem vindo à Área Administrativa do E-commerce "E aí, Docinho?"</h1>
                <hr>
                <h2 class="text-secondary">Selecione a categoria no menu ao lado</h2>
            </div>
    
        </div>
    </div>

    <footer class="container-fluid p-5 admin">
        <div class="row">
            <div class="col-md-8">
                <p>E-commerce da Squad Opala inserida no Programa de Capacitação, Treinamento e Seleção “DevStart” da PayLivre em parceria com a BeAcademy, com tema Doceria Fictícia, recebendo o nome fantasia: “E aí, Docinho?”.</p>
            </div>
            <div class="col-md-4">
                <img src="" alt="">
            </div>
        </div>
    </footer>

</x-app-layout>