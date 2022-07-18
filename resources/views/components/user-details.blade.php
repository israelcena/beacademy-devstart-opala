<div class="container mt-5">

    <div class="row align-middle">
        <h2 class="fs-4 text-center mt-3">Meus dados</h2>
        <hr>
    </div>

    <div class="row d-flex">
        <div class="col-md-6 text-start fs-5">
            <p>
                <strong>Nome:</strong> {{$selectUser->name}}
            </p>
            <p>
                <strong>Email:</strong> {{$selectUser->email}}
            </p>
            <p>
                <strong>CPF:</strong> {{$selectUser->cpf}}
            </p>
            <p>
                <strong>Data de nascimento:</strong> {{$selectUser->birth_date}}
            </p>
            <p>
                <strong>Telefone:</strong> {{$selectUser->phone}}
            </p>
            <p>
                <strong>CEP:</strong> {{$selectUser->cep}}
            </p>
            <p>
                <strong>Endereço:</strong> {{$selectUser->place}}
            </p>
            <p>
                <strong>Número:</strong> {{$selectUser->residence_number}}
            </p>
            <p>
                <strong>Cidade:</strong> {{$selectUser->city}}
            </p>
            <p>
                <strong>Estado:</strong> {{$selectUser->state}}
            </p>
            <p>
                <strong>País:</strong> {{$selectUser->country}}
            </p>
        </div>

        <div class="col-md-6 fs-5">
            <p>
                <strong>Data de cadastro:</strong> {{$selectUser->created_at}}
            </p>
            <p>
                <strong>Data de atualização:</strong> {{$selectUser->updated_at}}
            </p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-start">
            <a href="{{ route('users.edit', $selectUser->id) }}" class="btn btn-lg btn-primary">Editar</a>
        </div>
    </div>
</div>