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
                  <td>Guildford Area</td>
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
                  <li><a href="{{ $_ENV['URL'] }}/">Home</a></li>
                  <li><a href="{{ $_ENV['URL'] }}/catalog">Catalog</a></li>
                  <li><a href="{{ $_ENV['URL'] }}/servicing">Servicing</a></li>
                  <li><a href="{{ $_ENV['URL'] }}/faq">FAQ</a></li>
                  <li><a href="{{ $_ENV['URL'] }}/locations-contact">Locations & Contact</a></li>
                  <li><a href="{{ $_ENV['URL'] }}/privacy-policy">Privacy Policy</a></li>

              </ul>
            </div>
        </div>
      </div>

      @section('footer-scripts')
        <!-- Scripts are placed here -->
        {{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
        {{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
      @show

    </body>
</html>