@extends('layouts.base')

@section('title')
	Batteries Included - Locations & Contact
@stop

@section('content')

<div class="content-card">
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

<div class="content-card">

  <h2>Locations</h2>
  <p class="text">We have a variety of locations throughout the lower mainland, please see which store is
    closest to you and how to get to it below.
  </p>

  <h3>Surrey</h3>

    <img class="img-responsive location-image" src="img/locations/Guildford.png"/>

  <ul>
    <li><strong>Address:</strong> 10236 152nd Street Surrey, BC</li>
    <li><strong>Phone:</strong> (604) - 930 - 9889</li>
    <li><strong>Email:</strong> guildford@batteriesincluded.ca</li>
  </ul>

  <p class="text">Our Surrey store is located on the southeast corner of the 102A and 152nd Street
    intersection. It's located in the strip mall right across the street from Red Robins
    near Guildford Mall.
  </p>
  <hr />
  <h3>Richmond</h3>

    <img class="img-responsive location-image" src="img/locations/Richmond.png"/>

  <ul>
    <li><strong>Address:</strong> 5300 No. 3 Road Richmond, BC</li>
    <li><strong>Phone:</strong> (604) - 270 - 9989</li>
    <li><strong>Email:</strong> <a href="mailto:lansdowne@batteriesincluded.ca">lansdowne@batteriesincluded.ca</a></li>
  </ul>

  <p class="text">Our Richmond store is located inside Lansdowne Centre on No. 3 Road. We are near the east side of the building. The closest entrance to us is the Kwantlen Street enterance, and we are a few shops down on the right from that entrance.
  </p>
  <hr />
  <h3>White Rock</h3>

    <img class="img-responsive location-image" src="img/locations/White Rock.png"/>

  <ul>
    <li><strong>Address:</strong> 1711 152nd Street</li>
    <li><strong>Phone:</strong> (604) - 536 - 8108</li>
    <li><strong>Email:</strong> <a href="mailto:whiterock@batteriesincluded.ca">whiterock@batteriesincluded.ca</a></li>
  </ul>

  <p class="text">Our White Rock store is located inside Semiahmoo Mall on 152nd Street right by customer service.
  </p>
  <hr />
  <h3>Nanaimo</h3>
    <img class="img-responsive location-image" src="img/locations/Nanaimo.png"/>
  <ul>
    <li><strong>Address:</strong> 3200 North Island Way</li>
    <li><strong>Phone:</strong> (250) - 756 - 2838</li>
    <li><strong>Email:</strong> <a href="mailto:nanaimo@batteriesincluded.ca">nanaimo@batteriesincluded.ca</a></li>
  </ul>

  <p class="text">Our Nanimo store is located in the Country Club Centre on North Island Highway right by the food court.
  </p>
</div>


@stop