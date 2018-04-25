@extends('layouts.app')

@section('content')
<div class="container">
    <painel titulo = "Lista de Artigos" >
        <caminho v-bind:lista="{{$listaCaminhos}}"></caminho>
        <modal-link tipo="link" nome="exemploModal" titulo="criar" css=""></modal-link>
        <tabela-lista
            v-bind:titulos="['#','Título','Descrição']"
            v-bind:itens="[['1','PHP', 'OO'], ['2','VueJS', 'TDD']]"
            ordem = "asc"
            ordemcol = "1"
            detalhe = "#detalhe"
            create = "#create"
            edit = "#edit"
            remove = "#remove"
            token = "#token"
        ></tabela-lista>
    </painel>

    <modal nome="exemploModal"> </modal>     
</div>
@endsection
