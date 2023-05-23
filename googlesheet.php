<?php
//include auth.php file on all secure pages
include("auth.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>IoT Municipality of Loboc</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/Main.css">
    <link href="assets/css/Floodgrph.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

  </head>

<body>
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>LOBOC</em> River</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="index.html">Home</a></li>
        <li><a href="flood_graph.php">Flood Graph</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/loboc-river.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="caption">
              <h6>IoT Bantay Baha</h6>
              <h2><em>Municipality</em> of Loboc</h2>
          </div>
      </div>
  </section>

  <div style="background-image:assets/image/beauty;" class="container">
    <div class="section">
        
        <h2 style="text-align: center;">Bantay-Baha: Google Sheet Monitoring Data</h2>
        <ul>
          <li><iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vT6XVjO3HsJFI8Bm0xoyQh1AMHsIuGaqzS2kx_S3-1zD_prB6guLLp8HzH0pfRLD6EhWPTv-XsQwQTL/pubhtml?widget=true&amp;headers=false" width="100%" height="700px"></iframe></li>
        </ul>
    </div>
    <br><br>
    <div class="section">
    <?php
    require('db.php');
// assuming $mysqli is a valid mysqli object representing the database connection
$query = "SELECT * FROM `contact`";
$result = $con->query($query);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<th scope='row'>" . $row['id'] . "</th>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['phone_number'] . "</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

        
    </div>
  </div>
  <?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Establish a database connection
    require('db.php');

    // Retrieve the IP address from the form
   
    $ipAddress = mysqli_real_escape_string($con, $_POST['ip_address']);

    // Construct the INSERT query
    $query = "UPDATE `ip` SET `ip_address`='$ipAddress'";
    

    // Execute the INSERT query
    $result = mysqli_query($con, $query);

   

    // Close the database connection
    mysqli_close($con);
}
?>

<form action="" method="post">
    <input type="text" name="ip_address" placeholder="IP ADDRESS">
    <input type="submit" name="submit" value="Submit">
</form>
    
  <!-- ***** Main Banner Area End ***** -->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> Copyright 2023 Bantay-baha  
          
           | Design: <a href="#" rel="sponsored" target="_parent">IoT</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- <script src="assets/js/imagesloaded.pkgd.min.js"></script> -->
     <!-- https://imagesloaded.desandro.com/ -->
    <!-- <script src="assets/js/isotope.pkgd.min.js"></script> -->
     <!-- https://isotope.metafizzy.co/ -->
    <!-- <script src="assets/js/jquery.singlePageNav.min.js"></script> -->
     <!-- https://github.com/ChrisWojcik/single-page-nav -->


    <script>

        // Scroll to Top button
        var btn = $('#button');

        $(window).scroll(function () {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, '300');
        });

        // DOM is ready
        $(function () {
            // Single Page Nav
            $('#tm-nav').singlePageNav({ speed: 600 });

            // Smooth Scroll (https://css-tricks.com/snippets/jquery/smooth-scrolling/)
            $('a[href*="#"]')
                // Remove links that don't actually link to anything
                .not('[href="#"]')
                .not('[href="#0"]')
                .click(function (event) {
                    // On-page links
                    if (
                        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                        &&
                        location.hostname == this.hostname
                    ) {
                        // Figure out element to scroll to
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        // Does a scroll target exist?
                        if (target.length) {
                            // Only prevent default if animation is actually gonna happen
                            event.preventDefault();
                            $('html, body').animate({
                                scrollTop: target.offset().top
                            }, 600, function () {
                                // Callback after animation
                                // Must change focus!
                                var $target = $(target);
                                $target.focus();
                                if ($target.is(":focus")) { // Checking if the target was focused
                                    return false;
                                } else {
                                    $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                    $target.focus(); // Set focus again
                                };
                            });
                        }
                    }
                });

            /* Isotope Gallery */

            // init isotope
            var $gallery = $(".tm-gallery").isotope({
                itemSelector: ".tm-gallery-item",
                layoutMode: "fitRows"
            });
            // layout Isotope after each image loads
            $gallery.imagesLoaded().progress(function () {
                $gallery.isotope("layout");
            });

            $(".filters-button-group").on("click", "a", function () {
                var filterValue = $(this).attr("data-filter");
                $gallery.isotope({ filter: filterValue });
            });

            $(".tabgroup > div").hide();
            $(".tabgroup > div:first-of-type").show();
            $(".tabs a").click(function (e) {
                e.preventDefault();
                var $this = $(this),
                    tabgroup = "#" + $this.parents(".tabs").data("tabgroup"),
                    others = $this
                        .closest("li")
                        .siblings()
                        .children("a"),
                    target = $this.attr("href");
                others.removeClass("active");
                $this.addClass("active");
            });
        });
    </script>
   
</body>
</html>