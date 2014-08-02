<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            Batteries Included - They Make It First, We Make It Last!
            @show
        </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS are placed here -->
        @section('head')
        <link rel="stylesheet" href="{{ URL::asset('tb/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        @show
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
              <li><a id="home" href="/">Home</a></li>
              <li><a id="catalog" href="catalog">Catalog</a></li>
              <li><a id="servicing" href="servicing">Servicing</a></li>
              <li><a id="faq" href="faq">FAQ</a></li>
              <li><a id="locations-contact" href="locations-contact">Locations & Contact</a></li>
            </ul>
          </nav>
        </div>
      </header>
      <!-- Container -->
      <div class="container">

          <!-- Content -->
          @yield('content')

      </div>

      <hr />

      <!-- Site footer -->
      <div class="bottom">
        <div class="container">
            <div class="col-md-9">
              <h3>Locations</h3>
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                <tr>
                  <th>Surrey</th>
                  <th>Richmond</th>
                  <th>White Rock</th>
                  <th>Nanaimo</th>
                </tr>
                <tr>
                  <td>Guildford</td>
                  <td>Lansdowne Centre</td>
                  <td>Semiahmoo Mall</td>
                  <td>Country Club Centre</td>
                </tr>
                <tr>
                  <td>10236 - 152nd St</td>
                  <td>5300 No.3 Rd</td>
                  <td>1711 - 152nd St</td>
                  <td>3200 North Island Hwy.</td>
                </tr>
                <tr>
                  <td>(604) 930 - 9889</td>
                  <td>(604) 270 - 9989</td>
                  <td>(604) 536 - 8108</td>
                  <td>(250) 756 2838</td>
                </tr>
                </table>
              </div>
            </div>
            <div class="col-md-3">
                <h3>Useful Links</h3>
                <ul class="bottom-nav">
                  <li><a href="/">Home</a></li>
                  <li><a href="catalog">Catalog</a></li>
                  <li><a href="servicing">Servicing</a></li>
                  <li><a href="faq">FAQ</a></li>
                  <li><a href="locations-contact">Locations & Contact</a></li>
                  <li><a href="privacy-policy">Privacy Policy</a></li>
                  
              </ul>
            </div>
        </div>
      </div>

      @section('footer-scripts')
        <!-- Scripts are placed here -->
        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js') }}
        {{ HTML::script('tb/js/bootstrap.min.js') }}
      @show

    </body>
</html>