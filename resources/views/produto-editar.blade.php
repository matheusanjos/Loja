@extends('layout.base', ['current'=>'produtos'])

@section('body')
    <h1>Editar Produto</h1>
    <form action="/produtos/editar/{{ $p->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">        
            <label for="nome">Nome do Produto</label>
            <input type="text" class="form-control" name="nomeProduto" value={{ $p->nome }}>
            
            <label for="desc">Descrição do Produto</label>
            <textarea class="form-control" name="descProduto"> {{ $p->descricao }}</textarea>
            
            <label for="cat">Categoria do Produto</label>
            <select name="catProduto" class="form-control">
                @foreach($cats as $c)
                    @if($c->id == $p->id_categoria) 
                        <option selected value={{ $c->id }}> {{ $c->nome }} </option>
                    @else
                        <option value={{ $c->id }}> {{ $c->nome }} </option>
                    @endif
                @endforeach                
            </select>
        
            <label for="qtd">Quantidade do Produto</label>
            <input type="number" class="form-control" name="qtdProduto" value={{ $p->quantidade }}>

            <label for="pc">Preço do Produto</label>
            <input step="any" type="number" class="form-control" name="pcProduto" value={{ $p->preco }}>

            <label for="img">Imagem</label>
            <input type="file" class="form-control-file" name="imagemProduto">
            <img class="img-thumbnail" width=25% src="/storage/{{ $p->imagem }}">  
        
        
        </div>
        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
        <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
    </form>
@endsection