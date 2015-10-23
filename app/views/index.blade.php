@extends('layouts.base')

@section('title')
	Batteries Included - Home
@stop

@section('content')

	<div class="content-card col-md-10 col-md-offset-1">
		<div id="batteriesIncludedCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				@foreach($carousels as $carousel)
					<li data-target="#batteriesIncludedCarousel" data-slide-to="{{$carousel->id -1}}"></li>
				@endforeach
			</ol>
			<div class="carousel-inner" role="listbox">
				@foreach($carousels as $carousel)
					<div class="item" id="carousel-item">
						<img class="carousel-img" src="img/carousel/{{$carousel->image}}" alt="{{$carousel->title}}">
						<div class="container">
							<div class="carousel-caption">
								<h1>{{$carousel->title}}</h1>
								<p>{{$carousel->info}}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<a class="left carousel-control" href="#batteriesIncludedCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#batteriesIncludedCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div><!-- /.carousel -->

		<!-- START THE FEATURETTES -->
		<div class="row col-md-12">
			@foreach($contents as $content)
				<h2 class="featurette-heading">{{$content->heading}}</h2>
				<p class="lead">{{$content->content}}</p>
			@endforeach
		</div>
	</div>

@stop