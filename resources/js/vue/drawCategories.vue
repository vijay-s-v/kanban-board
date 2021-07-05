<template>
	<div class="category">
		<span class="category__name"> {{ category.name }} </span>
		<button class="category__delete" @click="deleteCategory();">
			Delete
		</button>
	</div>
</template>

<style lang="sass">

	@import '../../sass/app.scss';

	.category{
		width: 300px;
	}

	.category__name{}

	.category__delete{
		float: right;
	}

</style>

<script>
export default{
	props: ['category'],
	methods:{
		deleteCategory(){
			axios.delete('api/category/' + this.category.id)
			.then(response => {
				if(response.status == 200){
					this.$emit('categorychanged');
				}
			})
			.catch(error => { console.log( error ); })
		}
	}
}
</script>