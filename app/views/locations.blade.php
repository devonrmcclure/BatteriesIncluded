@extends('layouts.base')

@section('title')
	Batteries Included - Locations & Contact
@stop

@section('content')

<div class="content-card col-md-10 col-md-offset-1">
<h2>Hours</h2>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <tr>
        <th></th>
        <th>Sunday</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
      </tr>

      <tr>


      <tr>
        <th>Maple Ridge</th>
        @foreach($mr as $hour)
          @if($hour->open == '00:00:00')
            <td>CLOSED</td>
          @else
            <td>{{date('h:ia', strtotime($hour->open))}} - {{date('h:ia', strtotime($hour->close))}}</td>
          @endif
        @endforeach
      </tr>

      <th>Nanaimo</th>
        @foreach($nm as $hour)
          @if($hour->open == '00:00:00')
            <td>CLOSED</td>
          @else
            <td>{{date('h:ia', strtotime($hour->open))}} - {{date('h:ia', strtotime($hour->close))}}</td>
          @endif
        @endforeach
      </tr>

      <th>Surrey (Guildford)</th>
        @foreach($gf as $hour)
          @if($hour->open == '00:00:00')
            <td>CLOSED</td>
          @else
            <td>{{date('h:ia', strtotime($hour->open))}} - {{date('h:ia', strtotime($hour->close))}}</td>
          @endif
        @endforeach
      </tr>

      <th>Richmond</th>
        @foreach($rm as $hour)
          @if($hour->open == '00:00:00')
            <td>CLOSED</td>
          @else
            <td>{{date('h:ia', strtotime($hour->open))}} - {{date('h:ia', strtotime($hour->close))}}</td>
          @endif
        @endforeach
      </tr>

      <th>White Rock</th>
        @foreach($wr as $hour)
          @if($hour->open == '00:00:00')
            <td>CLOSED</td>
          @else
            <td>{{date('h:ia', strtotime($hour->open))}} - {{date('h:ia', strtotime($hour->close))}}</td>
          @endif
        @endforeach
      </tr>
    </table>
  </div>
</div>

<div class="content-card col-md-10 col-md-offset-1">

  <h2>Locations</h2>
  <p class="text">We have a variety of locations throughout the lower mainland, please see which store is
    closest to you and how to get to it below.
  </p>

  @foreach($locations as $location)
    <h3>{{$location->city}}</h3>
        <img class="img-responsive location-image" src="img/locations/{{$location->image}}"/>
    <ul>
     <li class="location-list"><i class="material-icons md-24 red500">location_on</i> {{$location->address}}</li>
         <li class="location-list"><i class="material-icons md-24 indigo500">call</i> {{$location->phone}}</li>
         <li class="location-list"><i class="material-icons md-24 green500">mail</i> <a href="mailto:{{$location->email}}?Subject=Website%20Query">{{$location->email}}</a></li>
    </ul>

    <p class="text">{{$location->description}}
    </p>

    <hr />
  @endforeach
</div>


@stop