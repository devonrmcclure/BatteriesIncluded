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
       <th>Maple Ridge</th>
       <td>12:00pm - 5:00pm</td>
       <td>9:30am - 5:30pm</td>
       <td>9:30am - 5:30pm</td>
       <td>9:30am - 5:30pm</td>
       <td>9:30am - 9:00pm</td>
       <td>9:30am - 9:00pm</td>
       <td>9:30am - 5:30pm</td>
     </tr>
      <tr>
        <th>Guildford</th>
        <td>CLOSED</td>
        <td>12:00pm - 6:00pm</td>
        <td>12:00pm - 6:00pm</td>
        <td>12:00pm - 6:00pm</td>
        <td>12:00pm - 6:00pm</td>
        <td>12:00pm - 6:00pm</td>
        <td>10:00am - 3:30pm</td>
      </tr>
      <tr>
        <th>Nanaimo</th>
        <td>11:00am - 5:00pm</td>
        <td>10:00am - 6:00pm</td>
        <td>10:00am - 6:00pm</td>
        <td>10:00am - 6:00pm</td>
        <td>10:00am - 9:00pm</td>
        <td>10:00am - 9:00pm</td>
        <td>10:00am - 6:00pm</td>
      </tr>
      <tr>
        <th>Richmond</th>
        <td>11:00am - 6:00pm</td>
        <td>10:00am - 6:00pm</td>
        <td>10:00am - 6:00pm</td>
        <td>10:00am - 9:00pm</td>
        <td>10:00am - 9:00pm</td>
        <td>10:00am - 9:00pm</td>
        <td>9:30am - 6:00pm</td>
      </tr>
      <tr>
        <th>White Rock</th>
        <td>12:00pm - 5:00pm</td>
        <td>10:00am - 6:00pm</td>
        <td>10:00am - 6:00pm</td>
        <td>10:00am - 6:00pm</td>
        <td>10:00am - 8:00pm</td>
        <td>10:00am - 8:00pm</td>
        <td>10:00am - 6:00pm</td>
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