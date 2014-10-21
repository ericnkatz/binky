var bustedbinky = angular.module('bustedbinky', ['infinite-scroll', 'wu.masonry']);

bustedbinky.controller('ProductsController', function($scope, Products) {
	$scope.products = new Products();
});

bustedbinky.factory('Products', function($http) {

	var Products = function () {
		this.items = [];
		this.busy = false;
		this.page = 1;
		this.total = null;
		this.last_page = null;
	};


	Products.prototype.nextPage = function ($location) {

		if (this.busy) {
			return;
		}

		
		
		if(this.page == this.last_page ) {
			return;
		}

		this.busy = true;

		var url = '/products?page=' + this.page;
		
		$http.get(url).success(function(data) {
			
			if(this.page == 1) {
				this.total = data.total;
				this.last_page = data.last_page + 1;

			}

			var items = data.data;

			for (var i = 0; i < items.length; i++) {
				this.items.push(items[i]);
			}


			this.page++;
			this.busy = false;

			console.log($('.product').length);

		}.bind(this));
		

	};

return Products;

});
