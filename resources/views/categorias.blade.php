@extends('layout.base', ["current"=>"categorias"])

@section('body')
    <h1>Categorias</h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categorias as $c)
      <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->nome }}</td>
        <td>
          <a href="/categorias/editar/{{$c->id}}" class="btn btn-primary btn-sm" style="width:28px; height:28px" title="Editar">
            <i class="far fa-edit"></i>
          </a>
          <a href="/categorias/apagar/{{$c->id}}"" class="btn btn-danger btn-sm" style="width:28px; height:28px" title="Excluir">
            <i class="fas fa-times"></i>
          </a>  
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection