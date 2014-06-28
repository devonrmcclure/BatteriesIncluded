<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <!-- Set the viewport so this responsive site displays correctly on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Batteries Included | They Make It First, We Make It Last!</title>
    <!-- Include bootstrap CSS -->
    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="includes/css/style.css" rel="stylesheet" /> 
  </head>

  <body>
    <!-- Site header and navigation -->
    <header class="top" role="header">
      <div class="container">
        <a class="navbar-brand pull-left">
          Batteries Included
        </a>
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="glyphicon glyphicon-align-justify"></span>
        </button>
        <nav class="navbar-collapse collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="catalog.php">Catalog</a></li>
            <li><a href="servicing.php">Servicing</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a class="active">Location & Contact</a></li>
          </ul>
        </nav>
      </div>
    </header>
    
    <!-- Middle content section -->
    <div class="container">
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
            <span class="bg-success">Your message has been successfully sent! We will be with you shortly!</span>
            <?php
              if(isset($_POST['submit'])) {

              } else {
            ?>
            <form class="form-horizontal noscript contact-form" id="contact-form" role="form" method="post">
              <div class="form-group">
                <label class="col-sm-2 control-label">Location</label>
                <div class="col-sm-10">
                  <select class="form-control col-xs-4" id="location" name="location">
                    <option selected="selected">-- Select Your Location --</option>
                    <option>Surrey</option>
                    <option>Richmond</option>
                    <option>White Rock</option>
                    <option>Nanaimo</option>
                  </select>
                  <label class="bg-danger" for="location" id="location-error">Please select a location.</label>
                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                  <label class="bg-danger" for="name" id="name-error">Please enter your name. We need to know who we're talking to!</label>
                </div>
              </div>

              <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Phone Number</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone_num">
                  <label class="bg-danger" for="phone" id="phone-error">Please enter a valid phone number including area code.</label>
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                  <label class="bg-danger" for="email" id="email-error">Please enter a valid email.</label>
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Subject</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
                  <label class="bg-danger" for="subject" id="subject-error">Please enter the reason for contacting us.</label>
                </div>
              </div>

              <div class="form-group">
                <label for="message" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="6" placeholder="Message" id="message" name="message"></textarea>
                  <label class="bg-danger" for="message" id="message-error">Please enter a message longer than 20 characters.</label>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default submit_button" id="submit_button" name="submit">Submit</button>
                </div>
              </div>
            </form>
            <?php 
              } // End else 
            ?>
        </div>
    </div>
    
    <hr />
    
    <?php require_once('includes/php/footer.php') ?>
    <script src="includes/js/send_form.js" type="text/javascript"></script>  

  </body>
</html>