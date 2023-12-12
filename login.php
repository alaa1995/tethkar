<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>تذكار</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=neckar" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section long_section px-0">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span>
          تذكار
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> حول</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="furniture.php">المنتجات</a>
              </li>
            
              
            </ul>
          </div>
          <div class="quote_btn-container">
            <a href="login.php">
              <span>
              تسجيل الدخول
              </span>
              <i class="fa fa-user" aria-hidden="true"></i>
            </a>
            <form class="form-inline">
              <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->




  
<?php

	
include 'connect.php';
ob_start();
session_start();

if (isset($_SESSION['user'])) {
    header('Location:home.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['login'])) {
      $email = $_POST['email'];
      $pass = $_POST['password'];
      //$hashedPass = sha1($pass);

    echo"1";

      $stmt = $con->prepare("SELECT 
                                  id, email, password
                              FROM 
                              user 
                              WHERE 
                                  email = ? 
                              AND 
                              password = ?");

      $stmt->execute(array($email, $pass));

      $get = $stmt->fetch();

      $count = $stmt->rowCount();
      echo"2";
      // If Count > 0 This Mean The Database Contain Record About This Username
      //header('Location:profile.php'); // Redirect To Dashboard Page
      if ($count > 0) {
        ob_start();
        session_start();
      $_SESSION['user'] = $email; // Register Session Name

        $_SESSION['id'] = $get['id']; // Register User ID in Session

          header('Location:home.php'); // Redirect To Dashboard Page

          exit();
      }elseif ($count = 0) {
       header('Location:signup.php');
      }
     
}


      }

?>	

  <!-- end furniture section -->




  <!-- end about section -->

  <!-- blog section -->

  
  <!-- end blog section -->

  <!-- client section -->

 

  <!-- contact section -->
  <section class="contact_section  long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
               تسجيل الدخول
              </h2>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>"   method="post" name="login" >
             
            
           
           
              <div>
                <input type="email" required name="email" class="required" placeholder="البريد الالكتروني" />
              
              </div>
              <div>
                <input type="password" required name="password" class="required" placeholder="كلمة المرور" />
            
              </div>
              <div class="btn_box">
                <button type="submit"  name="login">
                تسجيل
                </button>
                <h5 style="text-align: left;">
                  <a href="signup.php">
                  انشاء حساب
                </a></h5>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
             <img src="images/slider-img.png">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section long_section">

    <div class="container">
      <div class="contact_nav">
        <a href="">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <span>
            Call : +01 123455678990
          </span>
        </a>
        <a href="">
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <span>
            Email : tethkar@gmail.com
          </span>
        </a>
        <a href="">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <span>
            Location:jenin
          </span>
        </a>
      </div>

      <div class="info_top ">
        <div class="row ">
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="info_links">
              <h4>
               محتويات
              </h4>
              <div class="info_links_menu">
                <a class="" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
                <a class="" href="index.php#can">اصنع هديتك بنفسك</a>
                <a class="" href="index.php#update"> احدث المنتجات</a>
                <a class="" href="index.php#fa">تسوق حسب المنتجات</a>
                <a class="" href="about.php"> تذكار</a>
                <a class="" href="contact.php"> تسجيل الدخول</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
            <div class="info_post">
              <h5>
                INSTAGRAM FEEDS
              </h5>
              <div class="post_box">
                <div class="img-box">
                  <img src="images/f1.png" alt="">
                </div>
                <div class="img-box">
                  <img src="images/f2.png" alt="">
                </div>
                <div class="img-box">
                  <img src="images/f3.png" alt="">
                </div>
                <div class="img-box">
                  <img src="images/f4.png" alt="">
                </div>
                <div class="img-box">
                  <img src="images/f5.png" alt="">
                </div>
                <div class="img-box">
                  <img src="images/f6.png" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info_form">
              <h4>
               وسائل تواصل الاجتماعي
              </h4>
            
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->


  <!-- footer section -->
 
  <!-- footer section -->


  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>