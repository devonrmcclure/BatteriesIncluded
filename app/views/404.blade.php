@extends('layouts.base')

@section('title')
    Batteries Included - 404
@stop

@section('content')


<div class="content-card">
	<h2>Oops! It looks like the page you are trying to reach does not exist!</h2>

	<h3 class="form-header">Search Catalog</h3>
	{{ Form::open(array('url' => $_ENV['URL'] . '/search', 'class' => 'search', 'id' => 'search-form', 'role' => 'form', 'method' => 'GET')) }}
	<div class="group">
		{{ Form::text('search', '', array('class' => '', 'id' => 'search', 'required')) }}
		<span class="highlight"></span>
		<span class="bar"></span>
		{{ Form::label('search', 'Search') }}
	</div>

	{{ Form::close() }}
</div>

@stop