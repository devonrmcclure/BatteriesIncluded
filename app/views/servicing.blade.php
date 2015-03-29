    @extends('layouts.base')

@section('title')
	Batteries Included - Servicing
@stop

@section('content')

	<div class="col-md-7 content">


        <p class="servicing-tag">We do servicing on a variety of items. Choose a category below to learn more!</p>

        <div class="category-wrapper col-md-5">
            <a href="{{ $_ENV['URL'] }}/servicing/shavers">
                <div class="category-container">
                    <h1 class="category-glyphicon"><span class="glyphicon glyphicon-info-sign"></span></h1>
                    <h2 class="category-name">Shavers</h2>
               </div>
            </a>
        </div>

        <div class="category-wrapper col-md-5">
            <a href="{{ $_ENV['URL'] }}/servicing/appliance-repair">
                <div class="category-container">
                    <h1 class="category-glyphicon"><span class="glyphicon glyphicon-info-sign"></span></h1>
                    <h2 class="category-name">Small Appliance Repair</h2>
               </div>
            </a>
        </div>

        <div class="category-wrapper col-md-5">
            <a href="{{ $_ENV['URL'] }}/servicing/warranty">
                <div class="category-container">
                    <h1 class="category-glyphicon"><span class="glyphicon glyphicon-info-sign"></span></h1>
                    <h2 class="category-name">Warranty Servicing</h2>
               </div>
            </a>
        </div>

        <div class="category-wrapper col-md-5">
            <a href="{{ $_ENV['URL'] }}/servicing/battery-changes">
                <div class="category-container">
                    <h1 class="category-glyphicon"><span class="glyphicon glyphicon-info-sign"></span></h1>
                    <h2 class="category-name">Battery Changes</h2>
               </div>
            </a>
        </div>
    </div>

@stop