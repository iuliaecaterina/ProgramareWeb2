<?php
session_start(); // Start the session
include "connection.php";
$sql = "SELECT * FROM bikes";

if(isset($_POST["search"])) {
    $search_term = mysqli_real_escape_string($con, $_POST["search_box"]);
    $sql .= " WHERE brand LIKE '%$search_term%' OR color LIKE '%$search_term%'";
}

// daca am setat cookie
if (isset($_COOKIE['remember_token'])) {
   $cookie_message = "Cookie is set!";
} else {
   $cookie_message = "Cookie is not set!";
}



// Mesajul de bun venit
$welcome_message = "Bine ai venit, " . $_SESSION['username'] . "!";
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
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700,800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
   <p><?php echo $cookie_message; ?></p>
   <h1><?php echo $welcome_message; ?></h1>
      <!-- header section start -->
      <div class="header_section header_bg">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="index.php" class="logo"><img src="images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="admin.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="cycle.php">Biciclete</a>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.php">Contact</a>
                  </li>
               </ul>
               <form class="form-inline my-2 my-lg-0">
                  <div class="login_menu">
                        <?php
                           if (isset($_SESSION["username"])) {
                                 $username = $_SESSION["username"];
                                 echo '<ul><li><a href="logout.php">Logout</a></li></ul>';
                           } else {
                                 echo '<ul><li><a href="login.php">Login</a></li></ul>';
                           }
                        ?>
                  </div>
               </form>
               <form class="form-inline my-2 my-lg-0" method="post" action="cycle.php">
                         <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_box">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
               </form>

            </div>
            <div id="main">
               <span style="font-size:36px;cursor:pointer; color: #fff" onclick="openNav()"><img src="images/toggle-icon.png" style="height: 30px;"></span>
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

         <p class="cycle_text">It is a long established fact that a reader will be distracted by the </p>

         <?php
            include 'connection.php';
            // Fetch data from database
            $sql = 'SELECT * FROM bikes';
            $query = mysqli_query($con, $sql) or die(mysqli_error($con)); 
            
            // Loop through each row
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
                  <p class="lorem_text">Tip:       <?php echo $row['model']; ?></p>
                  <p class="lorem_text">Marime:    <?php echo $row['size']; ?></p>
                  <p class="lorem_text">Culoare:   <?php echo $row['color']; ?></p>
                  <p class="lorem_text"><?php echo $row['description']; ?></p>
                  <div class="btn_main">
                     <div class="buy_bt"><a href="#">Buy now!</a></div>
                     <h4 class="price_text">Pret <span style=" color: #f7c17b">$</span> <span
                           style=" color: #325662"><?php echo $row['pret']; ?></span></h4>
                  </div>
               </div>
            </div>
         </div>
         
         <?php } // End of while loop ?>
         
    </div>
         
      <div class="read_btn_main">
         <div class="read_bt"><a href="#">Read More</a></div>
      </div>
      <?php
                  include 'connection.php';
                  $sql='SELECT *  FROM bikes';
                  $query= mysqli_query($con, $sql) or die(mysqli_error($con)); 

               ?>
               <table width="60%" cellpadding="10" cellspace="10">
                  <tr>
                     <td><strong>Brand</strong></td>
                     <td><strong>Model</strong></td>
                     <td><strong>Tip</strong></td>
                     <td><strong>Marime</strong></td>
                     <td><strong>Culoare</strong></td>
                     <td><strong>Pret</strong></td>
                     <td><strong>Descriere</strong></td>
                  </tr>
                  <?php while($row=mysqli_fetch_array($query)){?>
                  <tr>
                     <td><?php echo $row["brand"];?></td>
                     <td><?php echo $row["model"];?></td>
                     <td><?php echo $row["type"];?></td>
                     <td><?php echo $row["size"];?></td>
                     <td><?php echo $row["color"];?></td>
                     <td><?php echo $row["pret"];?></td>
                     <td><?php echo $row["description"];?></td>
                     <td><?php echo "<img src='".$row["image"]."' alt='images' />"; ?></td>
                     <td><?php echo "<a href=\"view.php?id=".$row['id']."\">View</a> <a href=\"edit.php?id=".$row['id']."\">Edit</a> 
                     <a href=\"delete.php?id=".$row['id']."\" onclick=\"return confirm('Are you sure?')\" >Delete</a>"?></td>

                  </tr><?php }?>
               </table>
               <br/>
               <a href="insert.php">Adauga un produs</a><br/>
               <a href="search.php">Search</a>

   </div>

      <!-- cycle section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <h1 class="about_taital">About Our cycle Store</h1>
            <p class="about_text">Suntem o comunitate de pasionați ai ciclismului care împărtășesc aceeași dragoste pentru aventură și libertatea pe două roți. Ne străduim să oferim cele mai bune produse și servicii, împărtășind entuziasmul nostru pentru ciclism cu fiecare client.
            </p>
            <div class="about_main">
               <img src="images/img-5.png" class="image_5">
            </div>
            <div class="read_bt_1"><a href="#">Read More</a></div>
         </div>
      </div>
      <!-- about section end -->
      <!-- client section start -->
      <div class="client_section layout_padding">
         <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="client_main">
                        <h1 class="client_taital">Says Customers</h1>
                        <div class="client_section_2">
                           <div class="client_left">
                              <div><img src="images/client1.jpeg" class="client_img"></div>
                           </div>
                           <div class="client_right">
                              <div class="quote_icon"><img src="images/quote-icon.png"></div>
                              <p class="client_text">"Pedalele de bicicletă HIJ sunt excelente! Sunt ușoare, durabile și oferă o aderență excelentă chiar și în condiții umede. Axul rotativ cu rulmenți oferă o pedalare lină și eficientă, iar clemele reglabile permit un confort personalizat. În plus, designul lor modern arată și bine. Recomand cu încredere acest produs pentru orice ciclist care caută o upgrade pentru bicicleta lor."</p>
                              <h3 class="client_name">Stefan</h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="client_main">
                        <h1 class="client_taital">Says Customers</h1>
                        <div class="client_section_2">
                           <div class="client_left">
                              <div><img src="images/client3.jpeg" class="client_img"></div>
                           </div>
                           <div class="client_right">
                              <div class="quote_icon"><img src="images/quote-icon.png"></div>
                              <p class="client_text">"Bicicleta electrică EFG este pur și simplu uimitoare! A fost exact ceea ce căutam pentru deplasările mele zilnice în oraș. Motorul electric oferă un impuls subtil și confortabil, făcându-mi călătoria mult mai ușoară, mai ales pe dealuri. Bateria are o durată excelentă și se încarcă rapid, iar display-ul digital oferă informații clare despre viteză și nivelul bateriei. Este o bicicletă excelentă pentru navetiști și pentru cei care doresc să se deplaseze rapid și eficient în oraș."</p>
                              <h3 class="client_name">Andrei</h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="client_main">
                        <h1 class="client_taital">Says Customers</h1>
                        <div class="client_section_2">
                           <div class="client_left">
                              <div><img src="images/client2.jpeg" class="client_img"></div>
                           </div>
                           <div class="client_right">
                              <div class="quote_icon"><img src="images/quote-icon.png"></div>
                              <p class="client_text">Sunt absolut încântat de bicicleta mea de șosea! Este ușoară, rapidă și incredibil de receptivă pe asfalt. Cadru său din carbon este extrem de solid, iar transmisia Shimano oferă schimbări de viteză precise și fără efort. Am parcurs deja sute de kilometri pe această bicicletă și a răspuns perfect în fiecare situație. Recomand cu căldură pentru cei care doresc o bicicletă de șosea de înaltă performanță."</p>
                              <h3 class="client_name">Eduard</h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- client section end -->
      <!-- news section start -->
      <div class="news_section layout_padding">
         <div class="container">
            <h1 class="news_taital">News</h1>
            <p class="news_text">Fi la curent cu ultimele noutăți din lumea ciclismului, sfaturi practice, ghiduri de întreținere a bicicletelor, și multe altele, citind blogul nostru. Fii inspirat și informat pentru a-ți îmbunătăți experiența pe bicicletă și pentru a descoperi noi destinații și rute de explorat.</p>
            <div class="news_section_2 layout_padding">
               <div class="row">
                  <div class="col-sm-4">
                     <div class="box_main_1">
                        <div class="zoomout frame"><img src="images/img-6.png"></div>
                        <div class="padding_15">
                           <h2 class="speed_text">Cursa de mountain bike "Munții Noștri" a adunat pasionații de aventură din întreaga țară!</h2>
                           <div class="post_text">Post by : Den <span style="float: right;">20-12-2019</span></div>
                           <p class="long_text">Peste 200 de cicliști au luat startul într-o competiție plină de adrenalină și peisaje uimitoare. Citește mai mult pentru a afla cine a fost câștigătorul și pentru a vedea galeria foto cu momentele cheie ale evenimentului.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="box_main_1">
                        <div class="zoomout frame"><img src="images/img-7.png"></div>
                        <div class="padding_15">
                           <h2 class="speed_text">Sfaturi de întreținere pentru vara aceasta:</h2>
                           <div class="post_text">Post by : Den <span style="float: right;">20-12-2019</span></div>
                           <p class="long_text">Vara este aici și este momentul perfect să te bucuri de călătoriile cu bicicleta la soare! Cu toate acestea, temperaturile ridicate și condițiile de umiditate pot avea un impact asupra bicicletei tale. În acest articol, îți oferim câteva sfaturi utile pentru a-ți menține bicicleta în cea mai bună formă pe timp de vară, de la lubrifierea lanțului la protecția împotriva soarelui. </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="box_main_1">
                        <div class="zoomout frame"><img src="images/img-8.png"></div>
                        <div class="padding_15">
                           <h2 class="speed_text">Lansam noua linie de biciclete electrice pentru oraș</h2>
                           <div class="post_text">Post by : Den <span style="float: right;">20-12-2019</span></div>
                           <p class="long_text">Suntem încântați să anunțăm lansarea noii noastre linii de biciclete electrice, proiectate special pentru deplasările urbane. Cu modele elegante, baterii puternice și tehnologie de ultimă generație, aceste biciclete sunt perfecte pentru cei care doresc o alternativă eco-friendly și convenabilă la mijloacele de transport tradiționale. Descoperă gama noastră completă și începe să pedalezi în oraș în stil!</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- news section end -->
    
      
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8 col-sm-12 padding_0">
                  <div class="map_main">
                     <div class="map-responsive">
                     <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.1412886937374!2d27.56929057608594!3d47.17467021770496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61a6de8567%3A0x770562ffa2192d42!2sFacultatea%20de%20Matematic%C4%83!5e0!3m2!1sro!2sro!4v1714500949204!5m2!1sro!2sro" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.1412886937374!2d27.56929057608594!3d47.17467021770496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61a6de8567%3A0x770562ffa2192d42!2sFacultatea%20de%20Matematic%C4%83!5e0!3m2!1sro!2sro!4v1714500949204!5m2!1sro!2sro" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-12">
                  <div class="call_text"><a href="#"><img src="images/map-icon.png"><span class="padding_left_0">Page when looking at its layou</span></a></div>
                  <div class="call_text"><a href="#"><img src="images/call-icon.png"><span class="padding_left_0">Call Now  +01 123467890</span></a></div>
                  <div class="call_text"><a href="#"><img src="images/mail-icon.png"><span class="padding_left_0">demo@gmail.com</span></a></div>
                  <div class="social_icon">
                     <ul>
                        <li><a href="#"><img src="images/fb-icon1.png"></a></li>
                        <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                        <li><a href="#"><img src="images/linkedin-icon.png"></a></li>
                        <li><a href="#"><img src="images/instagram-icon.png"></a></li>
                     </ul>
                  </div>
                  <input type="text" class="email_text" placeholder="Enter Your Email" name="Enter Your Email">
                  <div class="subscribe_bt"><a href="#">Subscribe</a></div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text"><a href="https://php.design"></p><p class="copyright_text"> <a href="https://themewagon.com"></a></p>
         </div>
      </div>
      <!-- copyright section end -->    
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
           document.getElementById("main").style.marginLeft= "0";
          
         }

         $("#main").click(function(){
             $("#navbarSupportedContent").toggleClass("nav-normal")
         })
      </script>
   </body>
</php>