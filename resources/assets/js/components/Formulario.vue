<template>

	<form v-bind:class ="css" v-bind:action="action" v-bind:method="method" v-bind:enctype="enctype">
		<input v:if="alterMethod" type="hidden" name="_method" value="alterMethod">
		<input v:if="token" type="hidden" name="_token" v-bind:value="token">
		<slot></slot>
		
	</form>
</template>

<script>
    export default {
    	props:['css','action','method','enctype','token'],
    	data: function(){
    		return{
    			alterMethod:""
    		}
    	},
    	computed:{
    		defineMethod: function(){
    			if (this.method.toLoLoweCase() == "post" || this.method.toLoLoweCase() == "get" ) {
    				return this.method.toLoLoweCase();
    			}

    			if (this.method.toLoLoweCase() == "put" ) {
    				return this.alterMethod == "put";
    			}

    			if (this.method.toLoLoweCase() == "delete" ) {
    				return this.alterMethod == "delete";
    			}
    		}
    	}
    }
</script>
