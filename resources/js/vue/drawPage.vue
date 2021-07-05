<template>
	<div>
		<div v-for="(category, index) in categories" :key="index">
			<draw-categories
				:category="category"
				class="category"
				v-on:categorychanged="$emit('reloadpage')"
			/>
		</div>
	</div>
</template>

<style lang="sass">

	@import '../../sass/app.scss';

	.category{
		background: $category-bg-color;
		padding: 5px;
		margin-top: 5px;
	}

</style>

<script>
import drawCategories from "./drawCategories"

export default{
	props: ['categories'],
	components:{
		drawCategories
	}
}
</script>