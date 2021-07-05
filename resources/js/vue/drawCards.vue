<template>
	<div class="card">
		<span class="card__name"> {{card.name}} </span>
		<button class="card__button" @click="deleteCard();">
			Delete
		</button>
	</div>
</template>

<style lang="sass">

	@import '../../sass/app.scss';

	.card{
	}

	.card__button{
		float: right;
	}

	.card__name{
		font-size: 18px;
	}

</style>

<script>
export default{
	props: ['card'],
	methods:{
		deleteCard(){
			axios.delete('api/card/' + this.card.id)
			.then(response => {
				if(response.status == 200){
					this.$emit('cardchanged');
				}
			})
			.catch(error => { console.log( error ); })
		}
	}
}
</script>