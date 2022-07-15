<div>
  <h2>Listagem de usuários/clientes</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
          <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Criar novo usuário</a>
  
</div>