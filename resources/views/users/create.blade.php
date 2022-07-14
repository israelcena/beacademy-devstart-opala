<x-guest-layout>

  <div>
      @include('layouts.navbar')
  </div>

  <div class="container mt-5">
      <div class="row my-3">
          <h1 class="text-center">Criação de usuário</h1>
          <small>
              <span class="text-danger">*</span>
          Preencha todos os campos
          </small>
          <x-auth-validation-errors class="mb-4" :errors="$errors" />

          <form class="row g-3 form-group" action="{{ route('register') }}" method="POST">
            @csrf
              <div class="col-md-6">
                  <label class="form-label" for="name">Nome</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo" required>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
              </div>

              <div class="col-md-6">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Senha de no mínimo 8 dígitos">
              </div>
              <div class="col-md-6">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
              </div>
              <div class="col-md-4">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf">
              </div>
              <div class="col-md-4">
                <label for="birth_date" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date">
              </div>
              <div class="col-md-4">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="phone" name="phone">
              </div>
              <div class="col-md-6">
                <label for="place" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="place" name="place" placeholder="">
              </div>
              <div class="col-md-2">
                <label for="residence_number" class="form-label">Número</label>
                <input type="text" class="form-control" id="residence_number" name="residence_number" placeholder="Casa, Apto...">
              </div>
              <div class="col-md-2">
                <label for="city" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="city" name="city">
              </div>
              <div class="col-md-2">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep">
              </div>
              <div class="col-md-4">
                <label for="district" class="form-label">Estado</label>
                <select id="district" name="district" class="form-select">
                  <option selected>Escolha</option>
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
              </div>
              <div class="col-md-2">
                <label for="country" class="form-label">País</label>
                <input type="text" class="form-control" id="country" name="country">
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
      </div>                                    
  </div>
</x-guest-layout>