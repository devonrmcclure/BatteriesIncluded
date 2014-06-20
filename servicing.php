<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <!-- Set the viewport so this responsive site displays correctly on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Batteries Included | They Make It First, We Make It Last!</title>
    <!-- Include bootstrap CSS -->
    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/css/style.css" rel="stylesheet"> 
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
            <li><a class="active">Servicing</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="locations_contact.php">Location & Contact</a></li>
          </ul>
        </nav>
      </div>
    </header>
    
    <!-- Middle content section -->
    <div class="container">
        <div class="col-md-7 content">
            <h2>Who We Are</h2>
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sagittis diam metus, a fermentum arcu fermentum ac. Sed sit amet lorem in leo laoreet pretium. Etiam auctor ornare mi a cursus. Morbi interdum nibh quis ante malesuada facilisis. Praesent pharetra sapien sapien, eu sollicitudin risus rutrum vitae. Quisque id orci eu libero volutpat semper in id velit. Duis pretium volutpat turpis non feugiat.</p>
        </div>
        <div class="col-md-5 content">
            <h2>WHAT TO PUT HERE?!?</h2>
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sagittis diam metus, a fermentum arcu fermentum ac. Sed sit amet lorem in leo laoreet pretium. Etiam auctor ornare mi a cursus. Morbi interdum nibh quis ante malesuada facilisis. Praesent pharetra sapien sapien, eu sollicitudin risus rutrum vitae. Quisque id orci eu libero volutpat semper in id velit. Duis pretium volutpat turpis non feugiat.</p>
        </div>
    </div>
    
    <hr />
    
    <?php require_once('includes/php/footer.php') ?>
    
    
    <!-- Include jQuery and bootstrap JS plugins -->
    <script src="includes/jquery/jquery-2.1.0.min.js"></script>
    <script src="includes/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>