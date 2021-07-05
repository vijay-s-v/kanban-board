<template>
	<div class="add-category">
		<input type="text" v-model="category.name" />
		<button @click="addCategory();">Add Column</button>
	</div>
</template>

<style lang="sass">
	@import '../../sass/app.scss';
</style>

<script>

export default{
	data: function(){
		return{
			category:{
				name: ""
			}
		}
	},
	methods:{
		addCategory(){
			if( this.category.name == '' ){ return; }
			axios.post('api/category/store', {
				category: this.category
			})
			.then(response => {
				if( response.status == 201 ){
					this.category.name = '';
					this.$emit( 'reloadpage' );
				}
			})
			.catch(error => { console.log( error );} )
		}
	}
}

</script>