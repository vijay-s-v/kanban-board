<template>
	<div class="kanban-board">
		<div class="heading">
			<h1 id="title">Kanban Board</h1>
			<add-category-form
				v-on:reloadpage="getCategories();"
			/>
		</div>
		<draw-page
			:categories="categories"
			v-on:reloadpage="getCategories();"
		/>
	</div>
</template>

<style lang="sass">

	@import '../../sass/app.scss';

	.heading{
		width: 400px;
		margin: auto;
	}

</style>

<script>

import addCategoryForm from "./addCategoryForm.vue"
import drawPage from "./drawPage.vue"

export default{
	components:{
		addCategoryForm,
		drawPage
	},
	data: function(){
		return{
			categories: []
		}
	},
	methods:{
		getCategories(){
			axios.get('api/categories')
			.then(response => { this.categories = response.data	})
			.catch(error => { console.log( error ); })
		}
	},
	created(){
		this.getCategories();
	}
}

</script>