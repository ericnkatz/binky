var totalItems = 1;
var itemsPerPage = 30;
var $lastActiveHeight;

var $container;

$(function(){
	$('.hero-unit').waypoint(function(direction) {
		$(this).toggleClass('fixed');
	}, { offset : - ($('.hero-unit').height() + 50) });
//	$(document).pjax('.pager a', '.the-content');
	$(document).keydown($.debounce(300, function(e) {
		if (e.keyCode == 37 || e.keyCode == 38) {
			getProduct('previous');
			return false;
		}
		if (e.keyCode == 39 || e.keyCode == 40) {
			getProduct('next');
			return false;
		}
		if (e.keyCode == 27 ) {
			setActiveProduct();
		}
	}));
	$('body, .product, .productlist').on('click', function(e) {
		if( e.target !== this ) {
			return;
		}
		setActiveProduct();

	});
	$container = $('.productlist');

	renumber($('.product'));
	// initialize
	$('.product').each( function() {
		$(this).imagesLoaded( function() {
			$container.masonry({
				itemSelector: '.product',
				columnWidth: '.product-1'
			});
		});
	});
	$footerLogo = $('.bb-footer-logo');

	$('.product').on('click', '.content', function(e) {
		
		if($(this).parent().hasClass('active')){

		} else {
			e.preventDefault();
		}

		setActiveProduct($(this));

	});
	/*
	$container.infinitescroll({
		navSelector  : '.pager',    // selector for the paged navigation 
		nextSelector : '.pager a:last',  // selector for the NEXT link (to page 2)
		itemSelector : '.product'     // selector for all items you'll retrieve
		},
		// trigger Masonry as a callback
		function( newElements ) {

		$footerLogo.addClass('swing animated');
		// hide new items while they are loading
		var $newElems = $( newElements ).css({ opacity: 0 });
		renumber( newElements );
		// ensure that images load before adding to masonry layout
		$newElems.imagesLoaded(function(){
			// show elems now they're ready
			$newElems.animate({ opacity: 1 });
			$container.masonry( 'appended', $newElems, true );

			$footerLogo.removeClass('swing animated');
		});
		}
    );
	*/


});

function renumber( elements ) {
	$items = jQuery( elements );
	$items.each( function (index) {
		$(this).addClass('product-'+totalItems);
		$(this).attr('data-ordernum', totalItems);
		totalItems++;
	});

}
function setActiveProduct($product) {
	jQuery('.active .social').remove();
	$lastActiveHeight = jQuery('.active h2').outerHeight();
	jQuery('.product.active').find('img').css('padding-top',0);


	jQuery('.product.active').removeClass('active col-lg-6 col-md-8 col-xs-12 col-sm-12').addClass('col-lg-3 col-md-4 col-xs-12 col-sm-6');
	
	if(typeof $product != 'undefined') {
		$product.parent().removeClass('col-lg-3 col-md-4 col-xs-12 col-sm-6').addClass('col-lg-6 col-md-8 col-xs-12 col-sm-12 active');

		$lastActiveHeight = jQuery('.active h2').outerHeight();
		jQuery('.product.active').find('img').css('padding-top',$lastActiveHeight);

//	togglePrice();

		$theColumn = ($product.parent().hasClass('product-1')) ? '.product-2' : '.product-1';

	}

	$container.masonry({
		itemSelector: '.product',
		columnWidth: $theColumn
	});
	jQuery('html,body').animate({
		scrollTop: $('.product.active').offset().top - 65
	}, 180, 'linear');
	$container.masonry( 'on', 'layoutComplete', function( msnryInstance, laidOutItems ) {
		jQuery('html,body').animate({
			scrollTop: $('.product.active').offset().top - 65
		}, 300, 'linear');

		return true;
	});
}

function togglePrice() {
	$priceAmount = jQuery('.product.active').data('price');
	$priceContainer = jQuery('.product.active .price a');
	if($priceAmount) {
		$priceContainer.removeClass('btn btn-primary').text('$'+($priceAmount / 100).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()).addClass('large');
	} else {
		$priceContainer.removeClass('btn btn-primary').text('Price N/A').addClass('large');
	}

}
/*
getProduct accepts 'next' or 'previous'
 */
function getProduct( direction ) {
	direction = typeof direction !== 'undefined' ? direction : 'next';
	$active = $('.product.active');
	$activeProduct = $active.length;
	
	if(direction === 'next') {
		if(!$activeProduct) {
			setActiveProduct(jQuery('.product-1 .content'));
			return;
		}

		if($active.hasClass('.product-'+itemsPerPage)) {
		//	Load next page
			return;
		}

		setActiveProduct($active.next().children('.content'));
		return;
	} else {
		if(!$activeProduct || $active.hasClass('.product-1')) {
			setActiveProduct($('.product-'+itemsPerPage).children('.content'));
		//	Load prev page
			return;
		}

		setActiveProduct($active.prev().children('.content'));
		return;

	}

}