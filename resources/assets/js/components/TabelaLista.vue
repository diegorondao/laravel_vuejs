<template>
    <div>
    	<div>
            <a v-if="criar && !modal"  v-bind:href="criar">Novo Registro</a>
             <modal-link v-if="criar && modal" tipo="link" nome="adicionar" titulo="Novo Registro" css=""></modal-link>

    		<div class="form-group pull-right">
    			<input type="search" class="form-control" placeholder="Buscar" v-model="buscar" />
    		</div>	
	    </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos">{{titulo}}</th>
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
	                        <a v-if="edit && !modal" v-bind:href="edit">Editar  |</a>
                            <modal-link v-if="edit && modal" tipo="link" nome="editar" titulo="Editar  |" css=""></modal-link>

	                        <a href="#" v-on:click="executaForm(index)"> Remover</a>
                    	</form>
                    	<span v-if="!token">
	                        <a v-if="detalhe" v-bind:href="detalhe">Detalhe  |</a>
	                        <a v-if="edit && !modal" v-bind:href="edit">Editar  |</a>
                            <modal-link v-if="edit && modal" tipo="link" nome="editar" titulo="Editar  |" css=""></modal-link>
	                        <a v-if="remove" v-bind:href="remove">Remover</a>
                    	</span>
                    	<span v-if="token && !remove">
	                        <a v-if="detalhe" v-bind:href="detalhe">Detalhe  |</a>
	                        <a v-if="edit && !modal" v-bind:href="edit">Editar  |</a>
                            <modal-link v-if="edit && modal" tipo="link" nome="editar" titulo="Editar  |" css=""></modal-link>
                    	</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        props:['titulos','itens','ordem','ordemcol','detalhe','create','edit','remove','token', 'modal', 'criar'],
        data: function(){
        	return{
        		buscar:'',
                ordemAuxiliar: this.ordem || "asc",
                ordemAuxiliarCol: this.ordemcol || 0
        	}
        },
        methods:{
        	executaForm: function(index){
        		document.getElementById(index).submit();
        	},
            ordenaColuna: function(coluna){
                this.ordemAuxiliarCol = coluna;
                if (this.ordemAuxiliar.toLowerCase() == "asc") {
                    this.ordemAuxiliar = 'desc';
                } else {
                    this.ordemAuxiliar = 'asc';
                }
            }
        },
        computed:{
        	lista: function(){

                let ordem = this.ordemAuxiliar;
                let ordemCol = this.ordemAuxiliarCol;

                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == "asc"){
                    this.itens.sort(function(a, b){
                        if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]){return 1;}
                        if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]){return -1;}
                        return 0;
                    }); 

                }else{
                    this.itens.sort(function(a, b){
                        if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]){return 1;}
                        if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]){return -1;}
                        return 0;
                    }); 
                }

                if (this.buscar) {
            		return this.itens.filter(res=>{
    					for (let k = 0; k < res.length; k++ ) {
    						if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
    							return true;
    						}
    					}
    					return false;        			
            		});
                }    

        	return this.itens;
        	}
        }
    }
</script>
