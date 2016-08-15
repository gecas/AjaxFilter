Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');


new Vue({

	el: 'body',

	data : {
		products: [], 
		loading: false,
		checkedColors: [],
		checkedSizes: [],
	},

	ready: function(){
		 this.fetchProducts();
	},

	methods: {

		fetchProducts: function()
		{
			this.loading = true;

			this.$http.get('/ajax/products').then(function (products) {
		          this.$set('products', products.data);
				  this.loading = false;
		      }, function (response) {
		          console.log(error);
		      });
		},

		filterItems: function()
		{
			var colors = this.checkedColors;
			var sizes = this.checkedSizes;
			this.loading = true;

			var url = '/ajax/products/filtered';

			if(colors.length != 0 || sizes.length !=0){
			    this.$http.post(url, {colors: colors, sizes: sizes}).then(function (products) {
		            this.$set('products', products.data);
				    this.loading = false;
		        }, function (response) {
		            console.log(error);
		        });
		    } else{
		    	this.fetchProducts();
		    }
		},
	}

});