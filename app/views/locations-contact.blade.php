@extends('layouts.base')

@section('title')
	Batteries Included - Locations & Contact
@stop

@section('content')

<div class="col-md-7 content">
  <h2>Locations</h2>
  <p class="text">We have a variety of locations throughout the lower mainland, please see which store is
    closest to you, and how to get to it below.
  </p>

  <h3>Surrey</h3>
  <ul>
    <li><strong>Address:</strong> 10236 152nd Street Surrey, BC</li>
    <li><strong>Phone:</strong> (604) - 930 - 9889</li>
    <li><strong>Email:</strong> <a href="mailto:guildford@batteriesincluded.ca">guildford@batteriesincluded.ca</a></li>
  </ul>

  <p class="text">Our Surrey store is located on the southeast corner of the 102A and 152nd Street
    intersection. It's located in the strip mall right across the street from Red Robins
    near Guildford Mall. There is a big white sign that reads "Hobbies" and we are located in there.
  </p>

  <h3>Richmond</h3>
  <ul>
    <li><strong>Address:</strong> 5300 No. 3 Road Richmond, BC</li>
    <li><strong>Phone:</strong> (604) - 270 - 9989</li>
    <li><strong>Email:</strong> <a href="mailto:lansdowne@batteriesincluded.ca">lansdowne@batteriesincluded.ca</a></li>
  </ul>

  <p class="text">Our Richmond store is located inside Lansdowne Centre on No. 3 Road. We are near the east side of
    the building. The closest enterance to us is the Kwantlen Street enterance, and we are a few shops
    down on the rigt from that enterance.
  </p>

  <h3>White Rock</h3>
  <ul>
    <li><strong>Address:</strong> 1711 152nd Street</li>
    <li><strong>Phone:</strong> (604) - 536 - 8108</li>
    <li><strong>Email:</strong> <a href="mailto:whiterock@batteriesincluded.ca">whiterock@batteriesincluded.ca</a></li>
  </ul>

  <p class="text">Our White Rock store is located inside Semiahmoo Mall on 152nd Street right by customer service.
  </p>

  <h3>Nanaimo</h3>
  <ul>
    <li><strong>Address:</strong> 3200 North Island Way</li>
    <li><strong>Phone:</strong> (250) - 756 - 2838</li>
    <li><strong>Email:</strong> <a href="mailto:nanaimo@batteriesincluded.ca">nanaimo@batteriesincluded.ca</a></li>
  </ul>

  <p class="text">Our Nanimo store is located in the Country Club Centre on North Island Way right by the food court.
  </p>
</div>
<div class="col-md-5 content">
  <h2>Contact</h2>
  <noscript>
    It appears you have JavaScript disabled. You will not be able to see this form unless you have it enabled
    as it uses JavaScript to send the information.
  </noscript>
  <hr />
  {{ Form::open(array('url' => 'http://batteriesincluded.dev/locations-contact/send', 'class' => 'form-horizontal noscript contact-form', 'id' => 'contact-form', 'role' => 'form')) }}
    <div class="form-group">
      {{ Form::label('location', 'Location', array('class' => 'col-sm-2 control-label')) }}

      <div class="col-sm-10">
        {{ Form::select('location', array(
            'select_location' => '-- Select Your Location --',
            'surrey' => 'Surrey',
            'richmond' => 'Richmond',
            'white rock' => 'White Rock',
            'nanaimo' => 'Nanaimo',
        ), null, array('class' => 'form-control col-xs-4', 'id' => 'location'))}}

        {{ Form::label('location', 'Please select a location.', array('class' => 'bg-danger', 'id' => 'location-error'))}}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}

      <div class="col-sm-10">
        {{ Form::text('name', '', array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Your Name')) }}

        {{ Form::label('name', 'Please enter your name. We need to know who we\'re talking to!', array('class' => 'bg-danger', 'id' => 'name-error'))}}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('phone', 'Phone', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-10">
        {{ Form::text('phone_num', '', array('class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone Number')) }}

        {{ Form::label('phone', 'Please enter a valid phone number including area code.', array('class' => 'bg-danger', 'id' => 'phone-error')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}

      <div class="col-sm-10">
        {{ Form::email('email', '', array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email')) }}

        {{ Form::label('email', 'Please enter a valid email address.', array('class' => 'bg-danger', 'id' => 'email-error')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('subject', 'Subject', array('class' => 'col-sm-2 control-label')) }}

      <div class="col-sm-10">
        {{ Form::text('subject', '', array('class' => 'form-control', 'id' => 'subject', 'placeholder' => 'Subject')) }}

        {{ Form::label('subject', 'Please enter a subject.', array('class' => 'bg-danger', 'id' => 'subject-error')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('message', 'Message', array('class' => 'col-sm-2 control-label')) }}

      <div class="col-sm-10">
        {{ Form::textarea('message', '', array('class' => 'form-control', 'id' => 'message', 'placeholder' => 'Message', 'rows' => '6')) }}

        {{ Form::label('message', 'Please enter a message longer than 20 characters.', array('class' => 'bg-danger', 'id' => 'message-error')) }}
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Submit', array('class' => 'btn btn-default submit-button submit-button', 'id' => 'submit-button', 'name' => 'submit')) }}
      </div>
    </div>
  {{ Form::close() }}
</div>

@stop

@section('footer-scripts')
	@parent
	{{ HTML::script('js/send_form.js') }}
@stop