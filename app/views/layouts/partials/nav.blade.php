      <!-- Site header and navigation -->
      <div class="navbar navbar-inverted top navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="glyphicon glyphicon-align-justify"></span>
            </button>
            <a class="navbar-brand" href="{{ $_ENV['URL'] }}">Batteries Included</a>
          </div>
          <div class="navbar-collapse collapse">
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->username }} <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ $_ENV['URL'] }}/admin"><span class="glyphicon glyphicon-home"></span> Admin Home</a></li>
                    <li><a href="{{ $_ENV['URL'] }}/admin/add"><span class="glyphicon glyphicon-plus"></span> Add Catalog Item</a></li>
                    <li><a href="{{ $_ENV['URL'] }}/admin/edit/products"><span class="glyphicon glyphicon-edit"></span> Edit/Delete Product</a></li>
                    <li><a href="{{ $_ENV['URL'] }}/admin/edit/categories"><span class="glyphicon glyphicon-edit"></span> Edit Category Or Subcategory</a></li>
                    <li><a href="{{ $_ENV['URL'] }}/admin/password"><span class="glyphicon glyphicon-edit"></span> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ $_ENV['URL'] }}/admin/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  </ul>
                </li>
              </ul>
            @endif
          </div><!--/.nav-collapse -->
        </div>
      </div>



