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
	          <img class="first-slide" src="http://placehold.it/900x500" alt="First slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Shaver Service!</h1>
	              <p>We offer electric shaver cleaning and lubing service, and can change the battery! Come get your shaver serviced today!</p>
	              <p><a class="btn btn-lg btn-primary" href="#" role="button">More Info</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="second-slide" src="http://placehold.it/900x500" alt="Second slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Slide 2</h1>
	              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="third-slide" src="http://placehold.it/900x500" alt="Third slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Slide 3</h1>
	              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="fourth-slide" src="http://placehold.it/900x500" alt="Fourth slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Slide 4</h1>
	              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="fifth-slide" src="http://placehold.it/900x500" alt="Fifth slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <h1>Slide 5</h1>
	              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
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

	<div class="col-md-7 content">
		<h2>Who We Are</h2>
        <img src="/img/batt-inc-logo.JPG" />
		<p class="text">Welcome! The site is currently undergoing a few upgrades, so please bare with us if there are any errors, or the site doesn't load properly at times. We will be back up fully very soon! In the mean time, why not take a look at our catalog, or use the contact page to ask us any questions you may have.</p>
	</div>
	<div class="col-md-5 content">
		<!--<h2>WHAT TO PUT HERE?!?</h2>
		<p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sagittis diam metus, a fermentum arcu fermentum ac. Sed sit amet lorem in leo laoreet pretium. Etiam auctor ornare mi a cursus. Morbi interdum nibh quis ante malesuada facilisis. Praesent pharetra sapien sapien, eu sollicitudin risus rutrum vitae. Quisque id orci eu libero volutpat semper in id velit. Duis pretium volutpat turpis non feugiat.</p>-->
	</div>

@stop