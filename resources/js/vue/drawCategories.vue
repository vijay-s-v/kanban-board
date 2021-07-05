<template>
	<div class="category">
		<span class="category__name"> {{ category.name }} </span>
		<button class="category__button" @click="deleteCategory();">
			Delete
		</button>
		<div class="add-card">
			<input type="text" v-model="card.name" />
			<button class="category__button" @click="addCard();">Add Card</button>
		</div>
		<div v-for="(card, index) in cards" :key="index">
			<draw-cards
				:card="card"
				class="card"
				v-on:cardchanged="getCards();"
			/>
		</div>
	</div>
</template>

<style lang="sass">

	@import '../../sass/app.scss';

	.category{
		width: 300px;
	}

	.category__name{
		font-size: 25px;
	}

	.category__button{
		float: right;
		margin-top: 3px;
	}

	.card{
		background: $card-bg-color;
		padding-top: $card-padding;
		padding-left: $card-padding;
		padding-right: $card-padding;
	}


</style>

<script>

import drawCards from "./drawCards"

export default{
	data: function(){
		return{
			card:{
				name: "",
				desc: "Enter card description here.",
				categoryID: this.category.id
			}
		}
	},
	props: ['category','cards'],
	components:{
		drawCards
	},
	methods:{
		deleteCategory(){
			// ADD DELETE CARDS
			axios.delete('api/category/' + this.category.id)
			.then(response => {
				if(response.status == 200){
					this.$emit('categorychanged');
				}
			})
			.catch(error => { console.log( error ); })
		},
		addCard(){
			if( this.card.name == '' ){ return; }
			axios.post('api/card/store', {
				card: this.card
			})
			.then(response => {
				if( response.status == 201 ){
					this.card.name = '';
					this.getCards();
				}
			})
			.catch(error => { console.log( error ); })
		},
		getCards(){
			axios.get('api/card/' + this.category.id)
			.then(response => { this.cards = response.data	})
			.catch(error => { console.log( error ); })
		}
	},
	created(){
		this.getCards();
	}
}

</script>