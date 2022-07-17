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

        <div class="col-md-2 shadow-lg bg-light min-h-100">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10 vh-100 text-center mt-5">
            <div class="container">
                <h1 class="text-secondary fs-3">Dados de: {{$user->name}}</h1>
                <hr>
                <div class="row">
                    <div class="col-md-6 text-start">
                        <p>
                            <strong>Nome:</strong> {{$user->name}}
                        </p>
                        <p>
                            <strong>Email:</strong> {{$user->email}}
                        </p>
                        <p>
                            <strong>CPF:</strong> {{$user->cpf}}
                        </p>
                        <p>
                            <strong>Data de nascimento:</strong> {{$user->birth_date}}
                        </p>
                        <p>
                            <strong>Telefone:</strong> {{$user->phone}}
                        </p>
                        <p>
                            <strong>CEP:</strong> {{$user->cep}}
                        </p>
                        <p>
                            <strong>Endereço:</strong> {{$user->place}}
                        </p>
                        <p>
                            <strong>Número:</strong> {{$user->residence_number}}
                        </p>
                        <p>
                            <strong>Cidade:</strong> {{$user->city}}
                        </p>
                        <p>
                            <strong>Estado:</strong> {{$user->state}}
                        </p>
                        <p>
                            <strong>País:</strong> {{$user->country}}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <strong>Data de cadastro:</strong> {{$user->created_at}}
                        </p>
                        <p>
                            <strong>Data de atualização:</strong> {{$user->updated_at}}
                        </p>
                        <p>
                            <strong>Administrador:</strong>{{$user->admin ? ' Sim' : ' Não'}}
                        </p>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>