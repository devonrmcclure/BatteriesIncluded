      <!-- Site header and navigation -->
      <header class="top navbar-fixed-top" role="header">
        <div class="container">
          <a class="navbar-brand pull-left" href="{{ $_ENV['URL'] }}/">
            Batteries Included
          </a>
          <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="glyphicon glyphicon-align-justify"></span>
          </button>
          <nav class="navbar-collapse collapse" role="navigation">
            <ul class="nav navbar-nav">
              <li><a id="home" href="{{ $_ENV['URL'] }}/">Home</a></li>
              <li><a id="catalog" href="{{ $_ENV['URL'] }}/catalog">Catalog</a></li>
              <li><a id="servicing" href="{{ $_ENV['URL'] }}/servicing">Servicing</a></li>
              <li><a id="faq" href="{{ $_ENV['URL'] }}/faq">FAQ</a></li>
              <li><a id="locations-contact" href="{{ $_ENV['URL'] }}/locations-contact">Locations & Contact</a></li>
            </ul>
            @if(Auth::check())
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ $_ENV['URL'] }}/admin">Admin Home</a></li>
                    <li><a href="{{ $_ENV['URL'] }}/admin/add">Add Catalog Item</a></li>
                    <li><a href="{{ $_ENV['URL'] }}/admin/edit/products">Edit/Delete Product</a></li>
                    <li><a href="{{ $_ENV['URL'] }}/admin/edit/categories">Edit Category Or Subcategory</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ $_ENV['URL'] }}/admin/logout">Logout</a></li>
                  </ul>
                </li>
              </ul>
            @endif
          </nav>

        </div>
      </header>