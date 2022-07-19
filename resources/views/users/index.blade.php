<div>
  <h2>Clientes Registrados</h2>
  <small class="text-start">Clique no nome para mais detalhes</small>
  <hr>
 <div class="container">
  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
 </div>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td><a class="text-decoration-none fw-bold link-dark" href="{{ route('admin.user.show', $user->id) }}">{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
        <td>
          <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Editar</a> 
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDelete" data-id="{{$user->id}}">Excluir</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Criar novo usuário</a>
  
</div>

<div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" style="display: inline" enctype="multipart/form-data" id="formDelete">
    @csrf
    @method('DELETE')
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mx-auto text-danger fw-bold" id="exampleModalLabel">Confirmação de exclusão</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este usuário?
      </div>
      <div class="modal-footer">
        <input type="hidden" name="user_id" id="user_id" value="">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Excluir</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>
  window.onload = function() {
    let btnDelete = document.querySelectorAll('button[data-bs-toggle="modal"]');
    btnDelete.forEach(function(btn) {
      btn.addEventListener('click', function(e) {
        let id = e.target.dataset.id;
        // console.log(id);
        let form = document.getElementById('formDelete');
        form.action = `/admin/users/${id}`;
      });
    });
  }
</script>
