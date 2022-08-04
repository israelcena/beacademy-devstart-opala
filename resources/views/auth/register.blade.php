<x-guest-layout>

  @include('layouts.header')

  <div class="container mt-5">
      <div class="row my-3">
          <h1 class="text-center">Faça seu cadastro</h1>
          <small>
              <span class="text-danger">*</span>
          Preencha todos os campos
          </small>

          <form class="row g-3 form-group" action="{{ route('register') }}" method="POST">
            @csrf
              <div class="col-md-6">
                  <label class="form-label" for="name">Nome</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome Completo" value="{{ old('name') }}">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error ('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="col-md-6">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control @error ('password') is-invalid @enderror" id="password" name="password" placeholder="Senha de no mínimo 8 dígitos">
                @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="col-md-6">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control @error ('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="col-md-4">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control @error ('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf') }}">
                @error('cpf')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="birth_date" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control @error ('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
              </div>
              @error('birth_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              <div class="col-md-4">
                <label for="phone" class="form-label ">Telefone</label>
                <input type="text" class="form-control @error ('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Digite o formato (99) 99999-9999" value="{{ old('phone') }}">
                @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="place" class="form-label">Endereço</label>
                <input type="text" class="form-control @error ('place') is-invalid @enderror" id="place" name="place" placeholder="" value="{{ old('place') }}">
                @error('place')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-md-2">
                <label for="residence_number" class="form-label">Número</label>
                <input type="text" class="form-control @error ('residence_number') is-invalid @enderror" id="residence_number" name="residence_number" placeholder="Casa, Apto..." value="{{ old('residence_number') }}">
                @error('residence_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-md-2">
                <label for="city" class="form-label">Cidade</label>
                <input type="text" class="form-control @error ('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}">
                @error('city')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-md-2">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control @error ('cep') is-invalid @enderror" id="cep" name="cep" value="{{ old('cep') }}">
                @error('cep')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror 
              </div>
              <div class="col-md-4">
                <label for="district" class="form-label">Estado</label>
                <select id="district" name="district" class="form-select @error ('district') is-invalid @enderror">
                  <option value="{{ old('district') }}"></option>
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
                <input type="text" class="form-control @error ('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}">
                @error('country')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
      </div>                                    
  </div>
</x-guest-layout>