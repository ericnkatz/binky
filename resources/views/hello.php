<!DOCTYPE html>
<html ng-app="bustedbinky">
<head>
  <meta charset="utf-8">
  <title>Angular Starter Kit</title>

  <!-- Bootstrap core CSS -->
  <link href="/css/main.min.css" rel="stylesheet">
  
</head>
<body ng-controller="ProductsController" class="ng-cloak">
 
<div class="container">
  <div class="hero-unit">
      <h1><a href="/">Busted Binky</a></h1>
      <p class="subtitle" style="display:none;">Created to pacify the techie family</p>
      <ul class="social-media">
        <li class="facebook"><a href="http://facebook.com/BustedBinky">BustedBinky Facebook</a></li>
        <li class="twitter"><a href="http://twitter.com/BustedBinky">BustedBinky Twitter</a></li>
        <li class="pinterest"><a href="http://pinterest.com/bustedbinky/">BustedBinky Pinterest</a></li>
      </ul>
      <form class="navbar-search navbar-right" action="/search/">
          <input type="text" class="search-query" name="s" placeholder="Search" ng-model="searchText">
      </form>
  </div>
<h1 ngCloak>Products {{ products.total }} </h1>
<div class="boom" infinite-scroll='products.nextPage()' infinite-scroll-disabled='products.busy' infinite-scroll-distance='1'>
  <div masonry="{ transitionDuration: '0.2s' }" item-selector=".product" preserveorder class="row display-products productlist">
    <div masonry-brick class="col-md-4 col-xs-12 col-sm-6  product product-{{product.id}} {{ $index%2 == 0 ? 'odd' : 'even' }}" ng-repeat="product in products.items | filter:searchText">
      <div class="content">
        <a class="cropped" href="/products/{{product.id}}" target="_blank" onclick="_gaq.push(['_trackEvent', 'Products', 'Clickthrough', 'Fresco Chrome High Chair Frame -image']);">
          <h2>{{product.name}}</h2></a>
        <p class="price"><a href="/products/{{product.id}}" target="_blank">View Price</a></p>
      </div>
    </div>
 </div>
</div>

  <div ng-show='products.busy' class="loading"><p><i class="fa fa-spinner fa-spin"></i> Loading</p></div>
</div>
<div class="footer-ribbon">
  <div class="bb-footer-logo">
  </div>
</div>
<div class="container">
  <footer>
    <p>© Busted Binky <?php echo date('Y', time());?>. <a href="/contact-us">Contact Us</a></p>
  </footer>
</div>
  <script src="/components/jquery/jquery.min.js"></script>
  
  <!-- AngularJS -->
  <script src="/components/angular/angular.min.js"></script>
  <script src="/components/nginfinitescroll/build/ng-infinite-scroll.min.js"></script>
 <!-- <script src="/js/masonry.pkgd.min.js"></script> -->


        <script src="/components/jquery-bridget/jquery.bridget.js"></script>
        <script src="/components/get-style-property/get-style-property.js"></script>
        <script src="/components/get-size/get-size.js"></script>
        <script src="/components/eventEmitter/EventEmitter.js"></script>
        <script src="/components/eventie/eventie.js"></script>
        <script src="/components/doc-ready/doc-ready.js"></script>
        <script src="/components/matches-selector/matches-selector.js"></script>
        <script src="/components/outlayer/item.js"></script>
        <script src="/components/outlayer/outlayer.js"></script>
        <script src="/components/masonry/masonry.js"></script>
        <script src="/components/imagesloaded/imagesloaded.js"></script>
        <script src="/components/angular-masonry/angular-masonry.js"></script>

  <script src="/js/app.js"></script>
  <script data-pace-options='{ "startOnPageLoad": false }' src="/components/pace/pace.min.js"></script>
</body>
</html>

