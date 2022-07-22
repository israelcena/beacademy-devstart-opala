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
        <div class="col-md-10 mt-5">
            @if(isset($errors) && count($errors) > 0)
                <div class="alert alert-danger col-md-8 mx-auto">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
             @endif
            <div class="container">
                <div class="row">
                    <form id="form_edit" class="row g-3 form-group" action="{{ route('admin.user.update', $user->id) }}" method="POST">
                        @csrf
                    <h1>Editar dados de: {{$user->name}}</h1>
                    <div class="col-md-6">
                        <label class="form-label" for="name">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome Completo" value="{{$user->name}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" disabled>
                    </div>
                    <div class="col-md-4">
                      <label for="cpf" class="form-label">CPF</label>
                      <input type="text" class="form-control id="cpf" name="cpf" value="{{$user->cpf}}" disabled>
                    </div>
                    <div class="col-md-4">
                      <label for="birth_date" class="form-label">Data de Nascimento</label>
                      <input type="date" class="form-control @error ('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{$user->birth_date}}">
                    </div>
                    @error('birth_date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="col-md-4">
                      <label for="phone" class="form-label ">Telefone</label>
                      <input type="text" class="form-control @error ('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Digite o formato (99) 99999-9999" value="{{$user->phone}}">
                      @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="place" class="form-label">Endereço</label>
                      <input type="text" class="form-control @error ('place') is-invalid @enderror" id="place" name="place" placeholder="" value="{{$user->place}}">
                      @error('place')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-md-2">
                      <label for="residence_number" class="form-label">Número</label>
                      <input type="text" class="form-control @error ('residence_number') is-invalid @enderror" id="residence_number" name="residence_number" placeholder="Casa, Apto..." value="{{$user->residence_number}}">
                      @error('residence_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-md-2">
                      <label for="city" class="form-label">Cidade</label>
                      <input type="text" class="form-control @error ('city') is-invalid @enderror" id="city" name="city" value="{{$user->city}}">
                        
                      @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-md-2">
                      <label for="cep" class="form-label">CEP</label>
                      <input type="text" class="form-control @error ('cep') is-invalid @enderror" id="cep" name="cep" value="{{$user->cep}}">
                      @error('cep')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror 
                    </div>
                    <div class="col-md-4">
                      <label for="district" class="form-label">Estado</label>
                      <select id="district" name="district" class="form-select @error ('district') is-invalid @enderror">
                        <option value="{{$user->district}}">{{$user->district}}</option>
                        <option>Acre</option>
                        <option>Alagoas</option>
                        <option>Amapá</option>
                        <option>Amazonas</option>
                        <option>Bahia</option>
                        <option>Ceará</option>
                        <option>Distrito Federal</option>
                        <option>Espírito Santo</option>
                        <option>Goiás</option>
                        <option>Maranhão</option>
                        <option>Mato Grosso</option>
                        <option>Mato Grosso do Sul</option>
                        <option>Minas Gerais</option>
                        <option>Pará</option>
                        <option>Paraíba</option>
                        <option>Paraná</option>
                        <option>Pernambuco</option>
                        <option>Piauí</option>
                        <option>Rio de Janeiro</option>
                        <option>Rio Grande do Norte</option>
                        <option>Rio Grande do Sul</option>
                        <option>Rondônia</option>
                        <option>Roraima</option>
                        <option>Santa Catarina</option>
                        <option>São Paulo</option>
                        <option>Sergipe</option>
                        <option>Tocantins</option>
                      </select>
                      @error('district')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-md-2">
                      <label for="country" class="form-label">País</label>
                      <input type="text" class="form-control @error ('country') is-invalid @enderror" id="country" name="country" value="{{$user->country}}">
                      @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-12">
                      <a class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('form_edit').submit();">Atualizar</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>