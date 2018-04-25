@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <painel titulo = "Dashboard" >
                <caminho v-bind:lista="{{$listaCaminhos}}"></caminho>
                <div class="row">
                    <div class="col-md-4">
                        <caixa quantidade="80" titulo="Artigos" url="{{ route('artigos.index') }}" cor="orange" icone="fa fa-pie-chart"> </caixa>
                    </div>
                    <div class="col-md-4">
                        <caixa quantidade="150" titulo="Usuários" url="#" cor="blue" icone="fa fa-users"> </caixa>
                    </div>
                    <div class="col-md-4">
                        <caixa quantidade="5" titulo="Autores" url="#" cor="red" icone="fa fa-user"> </caixa>
                    </div>
                </div>
            </painel>
        </div>
    </div>
</div>
@endsection
