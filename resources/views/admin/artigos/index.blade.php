@extends('layouts.app')

@section('content')
<div class="container">
    <painel titulo = "Lista de Artigos" >
        <caminho v-bind:lista="{{$listaCaminhos}}"></caminho>
        <tabela-lista
            v-bind:titulos="['#','Título','Descrição']"
            v-bind:itens="{{$listaArtigos}}"
            ordem = "asc"
            ordemcol = "1"
            criar = "#Criar"
            detalhe = "#detalhe"
            create = "#create"
            edit = "#edit"
            remove = "#remove"
            token = "#token"
            modal = "sim"
        ></tabela-lista>
    </painel>

    <modal nome="adicionar">
        <painel titulo = "Adicionar" >
            <formulario css="" action="#" method="post" enctype="" token="">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título">
             </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Descrição</label>
                <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição">
            </div>
            <button type="submit" class="btn btn-info">Adicionar</button>
        </painel>
        </formulario>
    </modal>  

    <!-- FORM EDITAR-->
    <modal nome="editar">
        <painel titulo = "Editar" >
            <formulario css="" action="#" method="post" enctype="" token="">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título">
             </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Descrição</label>
                <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição">
            </div>
            <button type="submit" class="btn btn-info">Atualizar</button>
        </painel>
        </formulario>
    </modal>     
</div>
@endsection
