@extends('layouts.base')

@section('title')
  Batteries Included - Catalog
@stop

@section('content')

  @include('layouts.catalog-items.catalogNav')

  @include('layouts.catalog-items.catalogHeading')

  @include('layouts.catalog-items.catalogProducts')

@stop