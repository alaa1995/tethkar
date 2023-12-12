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

  <title >تذكار</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=neckar" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />
  <link href="fonts/29ltbukraregular.otf" rel="stylesheet" />
  <link href="fonts/22016-adobearabic.otf" rel="stylesheet" />
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
        <a class="navbar-brand" href="home.php">
          <span style="font-family:'29ltbukraregular';">
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
                <a class="nav-link" href="cart.php?do=cart">سلة المشتريات<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pay.php?do=pay">مشترياتي</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">تسجيل الخروج</a>
              </li>
              
            </ul>
          </div>
          <div class="quote_btn-container">
            <a href="profaile.php">
              
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
<?php
        include 'connect.php';
        ?>
<body>


<?php

    include 'connect.php';

    ob_start();
    session_start();
    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
    $Id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0; 
    $s = $con->prepare("SELECT 
  *
FROM 
campaigns
WHERE
id=?
");

$s->execute(array($Id));

$comp = $s->fetch();     
   
        if (isset($_SESSION['id'])) {
          $sessionUser = $_SESSION['id'];
            $getUser = $con->prepare("SELECT * FROM user WHERE id = ?");
            $getUser->execute(array($sessionUser));
            $info = $getUser->fetch();
            $userid = $info['id'];
   
         
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user   = $_POST['user'];
    $prodect   = $_POST['prodect'];
    $details   = $_POST['details'];
   
    
    $stmt = $con->prepare("INSERT INTO 
    pay(iduser,idprodect,details)
VALUES(:zuser,:zprodect,:zdetails)");     
$stmt->execute(array(

'zuser' => $user,  
'zprodect' => $prodect, 
'zdetails' => $details
 ));  
//echo "<h1>","تمت الاضافة بنجاح","</h1>";
             
                


echo'<div class="alert alert-success" role="alert"> تمت العملية بنجاح';

echo "</div>";

}


    $Id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0; 

    if ($do == 'main') {
    ?>
    <section class="furniture_section layout_padding" id="update">
    <div class="container">
      <div class="heading_container">
        <h2>
        <?php echo $comp['name']?> 
        </h2>
        <p>
        اختر هديتك بكل بساطه، دون العناء البحث لساعات طويلة  </p>
      </div>
      <div class="row">
      <?php  $stmtR = $con->prepare("SELECT comp.*,
                                prodect.name AS name,
                                prodect.id AS idp,
                                prodect.sort AS sort,
                                prodect.price AS price,
                                prodect.rest_count AS rest_count,
                                prodect.image AS image,
                                prodect.offer AS offer,
                                prodect.datailes AS datailes,
                                campaigns.id AS campaignsId,
                                campaigns.name AS campname
                              
                                
                         FROM comp 
                          INNER JOIN prodect
                          ON 
                          prodect.id = comp.idprodect
                          INNER JOIN campaigns
                          ON
                          campaigns.id= comp.comp
                         WHERE comp.comp = $Id
                               ");
                                $stmtR->execute();
                                $get = $stmtR->fetchAll();?>
      <?php  foreach($get as $gets) {?>
                    

               
                   
        <div class="col-md-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="admin/imageUp/<?php echo $gets['image'] ?>" alt="">
            </div>
            <div class="detail-box">
              <h5>
              <?php echo $gets['name'] ?>
              </h5>
              <div class="price_box">
                <h6 class="price_heading">
                  <span>₪</span> <?php echo $gets['price'] ?>
                </h6>
                <a href="pay.php?do=main&id=<?php echo $gets['idp']?>">
                  اشتري الان
                </a>
                <a href="cart.php?do=main&id=<?php echo $gets['idp']?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>
      </a>
              </div>
            </div>
          </div>
        </div>
        <?php   }  ?>
        
      
  
      </div>
    </div>
  </section>
               
         
  <!-- end contact section -->



  <!-- about section -->
  <?php
} elseif ($do == 'pay') { ?>

<?php
}   ?>

 
  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section long_section" style="background-color:#3E605C ; ">

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
            Email : demo@gmail.com
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
            <div class="info_form" >
              <h4>
               وسائل تواصل الاجتماعي
              </h4>
            
              <div class="social_box" >
                <a href="">
                  <i  class="fa fa-facebook" aria-hidden="true"></i>
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
<?php

	} else {
		header('Location: login.php');
		exit();
	}
  ?>