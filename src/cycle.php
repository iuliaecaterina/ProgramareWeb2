<?php
session_start(); // Start the session
include "connection.php";
$sql = "SELECT * FROM bikes";
if(isset($_POST["search"])) {
    $search_term = mysqli_real_escape_string($con, $_POST["search_box"]);
    $sql .= " WHERE brand LIKE '%$search_term%' OR color LIKE '%$search_term%'";
}

$query = mysqli_query($con, $sql) or die(mysqli_error($con));

?>
<!DOCTYPE php>
<php lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Cycle</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700,800&display=swap"
      rel="stylesheet">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesoeet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
      <script>
        function anti_right() {
            alert('Right Click not authorized!');
            return false;
        }
        document.oncontextmenu = anti_right;
        function disabletextselect(i) {
            return false;
        }
        function renabletextselect() {
            return true;
        }
        // Dacă este IE4+
        document.onselectstart = new Function("return false");
        // Dacă este NS6+
        if (window.sidebar) {
            document.onmousedown = disabletextselect;
            document.onclick = renabletextselect;
        }

    </script>
</head>

<body>
   <!-- header section start -->
   <div class="header_section header_bg">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a href="index.php" class="logo"><img src="images/logo.png"></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="cycle.php">Biciclete</a>
               </li>
               <!--<li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="news.php">News</a>
               </li>-->
               <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact</a>
               </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
               <div class="login_menu">
                  <ul>
                  <?php
                           if (isset($_SESSION["username"])) {
                                 $username = $_SESSION["username"];
                                 echo '<ul><li><a href="logout.php">Logout</a></li></ul>';
                           } else {
                                 echo '<ul><li><a href="login.php">Login</a></li></ul>';
                           }
                  ?>
                  </ul>
               </div>
               <div></div>
               </form>
               <br/><br/>
                        <form class="form-inline my-2 my-lg-0" method="post" action="cycle.php">
                           <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_box">
                           <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
                        </form>
            </form>
            </form>
         </div>
         <div id="main">
            <span style="font-size:36px;cursor:pointer; color: #fff" onclick="openNav()"><img
                  src="images/toggle-icon.png" style="height: 30px;"></span>
         </div>
      </nav>
               <!-- banner section start -->
               <div class="banner_section layout_padding">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="best_text">Best</div>
                              <div class="image_1"><img src="images/img-1.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital">New Model Cycle</h1>
                              <p class="banner_text">Descoperă gama noastră variată de biciclete și echipamente.</p>
                              <div class="contact_bt"><a href="contact.php">Shop Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="best_text">Best</div>
                              <div class="image_1"><img src="images/img-1.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital">New Model Cycle</h1>
                              <p class="banner_text">Echipa noastră este aici pentru tine.</p>
                              <audio controls>
                              <source src="videos/bike2.mp3" type="audio/mpeg">
                              Your browser does not support the audio tag.
                              </audio>
                              <div class="contact_bt"><a href="contact.php">Shop Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="best_text">Best</div>
                              <div class="image_1"><img src="images/img-1.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital">New Model Cycle</h1>
                              <p class="banner_text">Ia legătura cu noi! </p>
                              <div class="contact_bt"><a href="contact.php">Shop Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
         <!-- banner section end -->
   </div>
   <!-- header section end -->
   <!-- cycle section start -->
   <div class="cycle_section layout_padding">
      <div class="container">
         <h1 class="cycle_taital">Our cycle</h1>
         <p class="cycle_text">Descoperă o gamă largă de biciclete, accesorii și echipamente de cea mai înaltă calitate, gata să îți transforme fiecare pedalare într-o aventură de neuitat.</p>
   

         <?php
            include 'connection.php';
            
            $sql = 'SELECT * FROM bikes';
            $query = mysqli_query($con, $sql) or die(mysqli_error($con)); 
            
            
            while($row = mysqli_fetch_array($query)) {
        ?>
        
        <div class="cycle_section_2 layout_padding">
            <div class="row">
               <div class="col-md-6">
                  <div class="box_main">
                     <h6 class="number_text"><?php echo $row['id'];?></h6>
                     <div class="image_2"><img src="<?php echo $row['image']; ?>"></div>
                  </div>
               </div>
               <div class="col-md-6">
                  <h1 class="cycles_text"><?php echo $row['brand']; ?></h1>
                  <p class="lorem_text">Model:       <?php echo $row['model']; ?></p>
                  <p class="lorem_text">Tip:       <?php echo $row['type']; ?></p>
                  <p class="lorem_text">Marime:    <?php echo $row['size']; ?></p>
                  <p class="lorem_text">Culoare:   <?php echo $row['color']; ?></p>
                  <p class="lorem_text"><?php echo $row['description']; ?></p>
                  <div class="btn_main">
                     <div class="buy_bt"><a href="contact.php">Buy now!</a></div>
                     <h4 class="price_text">Pret <span style=" color: #f7c17b">$</span> <span
                           style=" color: #325662"><?php echo $row['pret']; ?></span></h4>
                  </div>
               </div>
            </div>
         </div>
         
         <?php } // End of while loop ?>
         
    </div>
         
   
   </div>
   <!-- cycle section end -->
   <!-- footer section start -->
   <div class="footer_section layout_padding">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8 col-sm-12 padding_0">
               <div class="map_main">
                  <div class="map-responsive">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.1412886937374!2d27.56929057608594!3d47.17467021770496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61a6de8567%3A0x770562ffa2192d42!2sFacultatea%20de%20Matematic%C4%83!5e0!3m2!1sro!2sro!4v1714500949204!5m2!1sro!2sro" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-12">

               <div class="call_text"><a href="#"><img src="images/call-icon.png"><span class="padding_left_0">Call Now
                         123467890</span></a></div>
               <div class="call_text"><a href="#"><img src="images/mail-icon.png"><span
                        class="padding_left_0">biciclete@gmail.com</span></a></div>
               <div class="social_icon">
                  <ul>
                  <li><a href="https://www.facebook.com/groups/iasiclubdebiciclete"><img src="images/fb-icon1.png"></a></li>
                        <div class="fb-share-button" data-href="https://www.facebook.com/UAICdinIASI" data-layout="" data-size=""><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FUAICdinIASI&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Distribuie</a></div>
                        <div class="fb-like" data-href="https://www.facebook.com/UAICdinIASI" data-width="40" data-layout="" data-action="" data-size="" data-share="false"></div>
                  </ul>
               </div>
            
            </div>
         </div>
      </div>
   </div>
   <!-- footer section end -->

   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- javascript -->
   <script src="js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   <script>
      function openNav() {
         document.getElementById("mySidenav").style.width = "250px";
         document.getElementById("main").style.marginLeft = "250px";
      }

      function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
         document.getElementById("main").style.marginLeft = "0";

      }

      $("#main").click(function () {
         $("#navbarSupportedContent").toggleClass("nav-normal");
      })
   </script>
</body>

</php>