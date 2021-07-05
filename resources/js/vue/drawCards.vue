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
		width: 250px;
	}

	.card__button{
		float: right;
		margin-top: 3px;
	}

	.card__name{
		font-size: 25px;
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