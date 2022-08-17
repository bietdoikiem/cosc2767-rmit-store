<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RMIT Store</title>

        <!-- Favicon -->
        <link rel="icon" href="img/favicon.jpg" type="image/png" />

        <!-- Bootstrap CSS & Other CSS library files -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendors/wow-js/animate.css">
        <link rel="stylesheet" href="vendors/owl_carousel/owl.carousel.css">
        <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/linearicons/linearicons-1.0.0.css">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet"> 
    </head>
    <body>
        <!--==========Main Header Section==========-->
        <header class="main_header_area">
            <nav class="navbar navbar-default navbar-fixed-top" id="main_navbar">
                <div class="container-fluid searchForm">
                    <form action="#" class="row">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="lnr lnr-magnifier"></i></span>
                            <input type="search" name="search" class="form-control" placeholder="Type to Search">
                            <span class="input-group-addon form_hide"><i class="lnr lnr-cross"></i></span>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <div class="row">
                    <div class="col-md-2 p0">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html">
                                <img src="img/rmit-store-logo.png" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="col-md-9 p0">
                            <ul class="nav navbar-nav main_nav">
                                <li><a href="https://www.campusstore.rmit.edu.au/collections/clothing">Clothing</a></li>
                                <li><a href="https://www.campusstore.rmit.edu.au/collections/accessories">Accessories</a></li>
                                <li><a href="https://www.campusstore.rmit.edu.au/collections/stationery">Stationery</a></li>
                                <li><a href="https://www.campusstore.rmit.edu.au/collections/course">Course</a></li>
                                <li><a href="https://www.campusstore.rmit.edu.au/collections/special-collection">Special-Collection</a></li>
                                <li><a href="https://www.campusstore.rmit.edu.au/collections/sale">Sale</a></li>
                            </ul>
                        </div>
                        <div class="col-md-1 p0">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#" class="nav_searchFrom"><i class="lnr lnr-magnifier"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--==========Main Header Section==========-->

        <!--==========Slider Section==========-->
        <section class="slider_area row m0">
            <div class="slider_inner">
                <div class="image-change">
                    <h2 class="wow fadeInUp animated">Global University</h2>
                    <h5 class="wow fadeIn animated" data-wow-delay="0.2s">Buy at Our Store</h5>
                    <a class="learn-more wow fadeInU" data-wow-delay="0.3s" href="#item-list">Buy Now!</a>
                </div>
            </div>
        </section>
        <!--==========Slider Section==========-->

        <section class="rmit-store-section row">
            <div class="check_tittle wow fadeInUp" data-wow-delay="0.4s" id="item-list">
                <h2>Our Store</h2>
            </div>
            <div class="row rmit-product-section">
              <?php
              $link = mysqli_connect(
                  "localhost",
                  "db_admin",
                  "rmit_password",
                  "rmit_store_db"
              );
              if ($link) {
                  $res = mysqli_query($link, "select * from store;");
                  while ($row = mysqli_fetch_assoc($res)) { ?>


                <div class="col-md-3 col-sm-5 product-content">
                    <?php echo '<img src="img/' .
                        $row["ImageUrl"] .
                        '" alt="">'; ?>
                    <div class="media">
                        <div class="media-left">

                        </div>
                        <div class="media-body">
                            <a href="#"><?php echo $row["Name"]; ?></a>
                            <p><?php echo $row["Price"]; ?> AUD</p>
                        </div>
                    </div>
                </div>

                <?php }
              } else {
                   ?>
                <div style="width: 100%">
                <div class="error-content">

                    <h1>Database connection error</h1>
                    <p>
                    <?php echo mysqli_connect_errno() .
                        ":" .
                        mysqli_connect_error(); ?>
                    </p>
                  </div>
                  </div>
                  <?php
              }
              ?>


            </div>
        </section>

        <!--==========Footer Area==========-->
        <footer class="footer_area row">
            <div class="container custom-container">
                <div class="copy_right_area">
                    <h4 class="copy_right">© Copyright 2022 RMIT Vietnam | Made with ❤️</h4>
                </div>
            </div>
        </footer>
        <!--==========Footer Area==========-->

        <!-- jQuery & Javascript libraries files -->
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="vendors/stellar/jquery.stellar.js"></script>
        <script src="vendors/owl_carousel/owl.carousel.min.js"></script>
        <script src="js/theme.js"></script>
        <script src="vendors/wow-js/wow.min.js"></script>
        <script src="vendors/Counter-Up/waypoints.min.js"></script>
        <script src="vendors/Counter-Up/jquery.counterup.min.js"></script>

    </body>
</html>
