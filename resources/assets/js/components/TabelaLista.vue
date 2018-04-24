<template>
    <div>
    	<div>
    		<a v-if="create" v-bind:href="create">Novo Registro</a>
    		<div class="form-group pull-right">
    			<input type="search" class="form-control" placeholder="Buscar" v-model="buscar" />
    		</div>	
	    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-for="titulo in titulos">{{titulo}}</th>
                    <th v-if="detalhe || edit || remove">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista">
                    <td v-for="i in item">{{i}}</td>
                    <td v-if="detalhe || edit || remove">
                    	<form v-bind:id="index" v-if="remove && token" v-bind:action="remove" method="post">
                    		<input type="hidden" name="_method" value="DELETE">
                    		<input type="hidden" name="_token" v-bind:value="token">

	                        <a v-if="detalhe" v-bind:href="detalhe">Detalhe  |</a>
	                        <a v-if="edit" v-bind:href="edit">Editar  |</a>
	                        <a href="#" v-on:click="executaForm(index)"> Remover</a>
                    	</form>
                    	<span v-if="!token">
	                        <a v-if="detalhe" v-bind:href="detalhe">Detalhe  |</a>
	                        <a v-if="edit" v-bind:href="edit">Editar</a>
	                        <a v-if="remove" v-bind:href="remove">Remover</a>
                    	</span>
                    	<span v-if="token && !remove">
	                        <a v-if="detalhe" v-bind:href="detalhe">Detalhe  |</a>
	                        <a v-if="edit" v-bind:href="edit">Editar</a>
                    	</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        props:['titulos','itens','ordem','ordemcol','detalhe','create','edit','remove','token'],
        data: function(){
        	return{
        		buscar:''
        	}
        },
        methods:{
        	executaForm: function(index){
        		document.getElementById(index).submit();
        	}
        },
        computed:{
        	lista: function(){

                let ordem = this.ordem ||"asc";
                let ordemCol = this.ordemcol || 0;

                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == "asc"){
                    this.itens.sort(function(a, b){
                        if(a[ordemCol] > b[ordemCol]){return 1;}
                        if(a[ordemCol] < b[ordemCol]){return -1;}
                        return 0;
                    }); 

                }else{
                    this.itens.sort(function(a, b){
                        if(a[ordemCol] < b[ordemCol]){return 1;}
                        if(a[v] > b[ordemCol]){return -1;}
                        return 0;
                    }); 
                }


        		return this.itens.filter(res=>{
					for (let k = 0; k < res.length; k++ ) {
						if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
							return true;
						}
					}
					return false;        			
        		});

        	return this.itens;
        	}
        }
    }
</script>
