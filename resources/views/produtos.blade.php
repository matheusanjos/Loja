@extends('layout.base', ["current"=>"produtos"])

@section('body')
    <h1>Produtos</h1>

    <table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Imagem</th>
      <th scope="col">Preço</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Categoria</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($produtos as $p)
        <tr>
          <td>{{$p->id}}</td>
          <td>{{$p->nome}}</td>
          <td>{{$p->descricao}}</td>
          <td>{{$p->imagem}}</td>
          <td>{{$p->preco}}</td>
          <td>{{$p->quantidade}}</td>
          <td>{{$p->id_categoria}}</td>
          <td>
              <a class = "btn btn-primary btn-sm" href="/produtos/editar/{{$p->id}}">Editar</a>
              <a class = "btn btn-danger btn-sm" href="/produtos/apagar/{{$p->id}}">Excluir</a>
          </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection