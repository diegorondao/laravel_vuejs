@extends('layouts.app')

@section('content')
<div class="container">
    <painel titulo = "Lista de Artigos" >
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
</div>
@endsection
