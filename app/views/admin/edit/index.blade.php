@extends('layouts.admin')

@section('title')
    Batteries Included - Edit Item
@stop

@section('content')

	<div class="row">
	    <div class="content-card col-md-3 col-md-offset-1">
	    	<h3><a href="/admin/home">Home Page</a></h3>

			<span class="pull-right">
				<span class="ripple-effect material-flat-button material-flat-edit"><a href="#">edit</a></span>
			</span>
	    </div>

	    <div class="content-card col-md-3">
	    	<h3><a href="/admin/products">Products</a></h3>

			<span class="pull-right">
				<span class="ripple-effect material-flat-button material-flat-add"><a href="#">add</a></span>
				<span class="ripple-effect material-flat-button material-flat-edit"><a href="#">edit</a></span>
				<span class="ripple-effect material-flat-button material-flat-delete"><a href="#">delete</a></span>
			</span>
	    </div>

	    <div class="content-card col-md-3">
			<h3><a href="/admin/categories">Categories</a></h3>

			<span class="pull-right">
				<span class="ripple-effect material-flat-button material-flat-add"><a href="#">add</a></span>
				<span class="ripple-effect material-flat-button material-flat-edit"><a href="#">edit</a></span>
				<span class="ripple-effect material-flat-button material-flat-delete"><a href="#">delete</a></span>
			</span>
	    </div>
	</div>


	<div class="row">
	    <div class="content-card col-md-3 col-md-offset-1">
			<h3><a href="/admin/servicing">Servicing</a></h3>

			<span class="pull-right">
				<span class="ripple-effect material-flat-button material-flat-add"><a href="#">add</a></span>
				<span class="ripple-effect material-flat-button material-flat-edit"><a href="#">edit</a></span>
				<span class="ripple-effect material-flat-button material-flat-delete"><a href="#">delete</a></span>
			</span>
	    </div>

	    <div class="content-card col-md-3">
			<h3><a href="/admin/faqs">FAQs</a></h3>

			<span class="pull-right">
				<span class="ripple-effect material-flat-button material-flat-add"><a href="#">add</a></span>
				<span class="ripple-effect material-flat-button material-flat-edit"><a href="#">edit</a></span>
				<span class="ripple-effect material-flat-button material-flat-delete"><a href="#">delete</a></span>
			</span>
	    </div>

	    <div class="content-card col-md-3">
			<h3><a href="/admin/locations-contact">Locations & Contact</a></h3>

			<span class="pull-right">
				<span class="ripple-effect material-flat-button material-flat-add"><a href="#">add</a></span>
				<span class="ripple-effect material-flat-button material-flat-edit"><a href="#">edit</a></span>
				<span class="ripple-effect material-flat-button material-flat-delete"><a href="#">delete</a></span>
			</span>
	    </div>
	</div>
@stop