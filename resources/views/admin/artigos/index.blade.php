@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <painel titulo = "Lista de Artigos" >
                <tabela-lista
                    v-bind:titulos="['#','Título','Descrição']"
                    v-bind:itens="[['1','PHP', 'OO'], ['2','VueJS', 'TDD']]"
                    detalhe = "#detalhe"
                    create = "#create"
                    edit = "#edit"
                    remove = "#remove"
                    token = "#token"
                ></tabela-lista>
            </painel>
        </div>
    </div>
</div>
@endsection
