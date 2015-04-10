@extends('layouts.base')

@section('title')
	Batteries Included - Home
@stop

@section('content')

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	      <!-- Indicators -->
	      <ol class="carousel-indicators">
	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	        <li data-target="#myCarousel" data-slide-to="1"></li>
	        <li data-target="#myCarousel" data-slide-to="2"></li>
	        <li data-target="#myCarousel" data-slide-to="3"></li>
	        <li data-target="#myCarousel" data-slide-to="4"></li>
	      </ol>
	      <div class="carousel-inner" role="listbox">
	        <div class="item active">
	          <img class="first-slide" src="img/carousel/shavers.jpg" alt="Shaver Service">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Shaver Service</h1>
	              <p>We offer electric shaver cleaning and lubing service, and can change the battery! Come get your shaver serviced today!</p>
	              <p><a class="btn btn-lg btn-primary" href="{{ $_ENV['URL'] }}/servicing/shavers" role="button">Learn More</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="second-slide" src="img/carousel/replace-batteries.jpg" alt="Battery Replacement">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Battery Changes</h1>
	              <p>We change the batteries in your watches, clocks, key fobs, and much more!</p>
                  <p><a class="btn btn-lg btn-primary" href="{{ $_ENV['URL'] }}/servicing/battery-changes" role="button">Learn More</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="third-slide" src="img/carousel/home-alarm-batteries.jpg" alt="Home Alarm Batteries">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Home Alarm Batteries</h1>
	              <p>We have many different home alarm batteries to suit your needs.
	              <p><a class="btn btn-lg btn-primary" href="http://batteriesincluded.dev/catalog/Alarm%20Batteries" role="button">Browse Catalog</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="fourth-slide" src="img/carousel/small-appliances.jpg" alt="Small Appliance Repair">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Small Appliance Repair</h1>
	              <p>Have a small appliance that's no longer working? We can fix it!</p>
	              <p><a class="btn btn-lg btn-primary" href="{{ $_ENV['URL'] }}/servicing/appliance-repair" role="button">Learn More</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="fifth-slide" src="img/carousel/small-appliances.jpg" alt="Warranty Service">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Warranty Servicing</h1>
	              <p>Have a small appliance that's still under warranty? Bring it to us and we can take care of it! We service most brands.</p>
	              <p><a class="btn btn-lg btn-primary" href="{{ $_ENV['URL'] }}/servicing/warranty" role="button">Learn More</a></p>
	            </div>
	          </div>
	        </div>
	      </div>
	      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	      </a>
	      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	      </a>
	    </div><!-- /.carousel -->




	         <!-- START THE FEATURETTES -->



         <div class="row featurette">
           <div class="col-md-7">
             <h2 class="featurette-heading">Who We Are</h2>
             <p class="lead">Welcome! The site is currently undergoing a few upgrades, so please bear with us if there are any errors, or the site doesn't load properly at times. We will be back up fully very soon! In the mean time, why not take a look at our catalog, or use the contact page to ask us any questions you may have.</p>
           </div>
           <div class="col-md-5"><br /><br /><br /><br /><br />
             <img class="featurette-image img-responsive center-block" src="img/batt-inc-logo.JPG" alt="Batteries Included Logo">
           </div>
         </div>

        <!--<hr class="featurette-divider">

         <div class="row featurette">
           <div class="col-md-7 col-md-push-5">
             <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
             <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
           </div>
           <div class="col-md-5 col-md-pull-7">
             <img class="featurette-image img-responsive center-block" src="http://placehold.it/500x500" alt="Generic placeholder image">
           </div>
         </div>

         <hr class="featurette-divider">

         <div class="row featurette">
           <div class="col-md-7">
             <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
             <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
           </div>
           <div class="col-md-5">
             <img class="featurette-image img-responsive center-block" src="http://placehold.it/500x500" alt="Generic placeholder image">
           </div>
         </div>-->

	<!--<div class="col-md-7 content">
		<h2>Who We Are</h2>
        <img src="/img/batt-inc-logo.JPG" />
		<p class="text">Welcome! The site is currently undergoing a few upgrades, so please bare with us if there are any errors, or the site doesn't load properly at times. We will be back up fully very soon! In the mean time, why not take a look at our catalog, or use the contact page to ask us any questions you may have.</p>
	</div>
	<div class="col-md-5 content">
		<!-<h2>WHAT TO PUT HERE?!?</h2>
		<p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sagittis diam metus, a fermentum arcu fermentum ac. Sed sit amet lorem in leo laoreet pretium. Etiam auctor ornare mi a cursus. Morbi interdum nibh quis ante malesuada facilisis. Praesent pharetra sapien sapien, eu sollicitudin risus rutrum vitae. Quisque id orci eu libero volutpat semper in id velit. Duis pretium volutpat turpis non feugiat.</p>-->
	<!--</div>-->

@stop