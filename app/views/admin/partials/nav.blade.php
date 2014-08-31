      <!-- Site header and navigation -->
      <header class="top navbar-fixed-top" role="header">
        <div class="container">
          <a class="navbar-brand pull-left" href="http://batteriesincluded.dev/">
            Batteries Included
          </a>
          <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="glyphicon glyphicon-align-justify"></span>
          </button>
          <nav class="navbar-collapse collapse" role="navigation">
            <ul class="nav navbar-nav">
              <li><a id="home" href="http://batteriesincluded.dev/">Home</a></li>
              <li><a id="catalog" href="http://batteriesincluded.dev/catalog">Catalog</a></li>
              <li><a id="servicing" href="http://batteriesincluded.dev/servicing">Servicing</a></li>
              <li><a id="faq" href="http://batteriesincluded.dev/faq">FAQ</a></li>
              <li><a id="locations-contact" href="http://batteriesincluded.dev/locations-contact">Locations & Contact</a></li>
            </ul>
            @if(Auth::check())
              <p class="navbar-text navbar-right">
                <a href="http://batteriesincluded.dev/admin" class="navbar-link">{{ Auth::user()->username }}</a>
              </p>
              <a href="http://batteriesincluded.dev/admin/logout">
                <button type="button" class="btn btn-default btn-sm navbar-btn pull-right">Sign Out</button>
              </a>
            @endif
          </nav>

        </div>
      </header>