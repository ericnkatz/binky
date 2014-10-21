<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>

  <!-- Bootstrap core CSS -->
  <link href="/css/main.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body>
 
<div class="container">
  <div class="hero-unit">
      <h1><a href="/">Busted Binky</a></h1>
      <p class="subtitle" style="display:none;">Created to pacify the techie family</p>
      <ul class="social-media">
        <li class="facebook"><a href="http://facebook.com/BustedBinky"><i class="fa fa-facebook-square"></i></a></li>
        <li class="twitter"><a href="http://twitter.com/BustedBinky"><i class="fa fa-twitter-square"></i></a></li>
        <li class="pinterest"><a href="http://pinterest.com/bustedbinky/"><i class="fa fa-pinterest-square"></i></a></li>
      </ul>
      <form class="navbar-search navbar-right" action="/search/">
          <input type="text" class="search-query" name="s" placeholder="Search">
      </form>
  </div>
  <ul class="nav nav-pills">
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        Products
        <b class="caret"></b>
      </a>
    <ul class="dropdown-menu">
      <!-- links -->
              
         <li><a href="/view/baby-gear">Baby Gear</a></li>
                
         <li><a href="/view/toys">Toys</a></li>
                
         <li><a href="/view/humor">Humor</a></li>
                
         <li><a href="/view/monogrammed-baby-gifts">Monogrammed Baby Gifts</a></li>
                
         <li><a href="/view/nursery">Nursery</a></li>
                
         <li><a href="/view/meal-time">Meal Time</a></li>
                
         <li><a href="/view/strollers-and-travel-systems">Strollers and Travel Systems</a></li>
                
         <li><a href="/view/apparel">Apparel</a></li>
                
         <li><a href="/view/baby-gadgets">Baby Gadgets</a></li>
                
         <li><a href="/view/little-sports-fans">Little Sports Fans</a></li>
                
         <li><a href="/view/coupons">Coupons and Deals</a></li>
                
         <li><a href="/view/baby-shower-gifts">Baby Shower Gifts</a></li>
                
         <li><a href="/view/funny-baby-shower-gifts">Funny Baby Shower Gifts</a></li>
                
         <li><a href="/view/home-and-garden">Home and Garden</a></li>
                
         <li><a href="/view/nursery-art-inspiration">Nursery Art Inspiration</a></li>
                
         <li><a href="/view/gifts-for-mom">Gifts for Mom</a></li>
            </ul>
  </li>
  <li><a href="/blog">Blog</a></li>
  <li><a href="/about-us">About Us</a></li>
</ul>
<div class="the-content">
  @yield('content')
</div>
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
  <script src="/components/jquery-pjax/jquery.pjax.js"></script>
  <script src="/components/eventEmitter/EventEmitter.min.js"></script>
  <script src="/components/imagesloaded/imagesloaded.js"></script>
  <script src="/components/jquery-masonry/dist/masonry.pkgd.min.js"></script>
  <script src="/components/infinite-scroll/jquery.infinitescroll.min.js"></script>
  <script src="/components/jquery-waypoints/waypoints.min.js"></script>
  <script src="/components/jquery-throttle-debounce/jquery.ba-throttle-debounce.min.js"></script>
  <script src="/components/bootstrap-sass-official/vendor/assets/javascripts/bootstrap/dropdown.js"></script>

  <script src="/js/app.js"></script>

   <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</body>
</html>

