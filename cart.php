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
    <style>
  .fa {
  font-size: 25px;
}

.checked {
  color: orange;
}
.card { 
    max-width: 33rem; 
    background: #fff; 
    margin: 0 1rem; 
    padding: 1rem; 
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
    width: 100%; 
    border-radius: 0.5rem; 
} 
  
.star { 
    font-size: 10vh; 
} 
  
.one { 
    color: rgb(255, 0, 0); 
} 
  
.two { 
    color: rgb(255, 106, 0); 
} 
  
.three { 
    color: rgb(251, 255, 120); 
} 
  
.four { 
    color: rgb(255, 255, 0); 
} 
  
.five { 
    color: rgb(24, 159, 14); 
}
  </style>

<?php
        include 'connect.php';
        ?>
<body>


<?php

    include 'connect.php';

    ob_start();
    session_start();
    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
           
   
        if (isset($_SESSION['id'])) {
          $sessionUser = $_SESSION['id'];
            $getUser = $con->prepare("SELECT * FROM user WHERE id = ?");
            $getUser->execute(array($sessionUser));
            $info = $getUser->fetch();
            $userid = $info['id'];
   
         
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//echo "<h1>","تمت الاضافة بنجاح","</h1>";
             
                


echo'<div class="alert alert-success" role="alert"> تمت العملية بنجاح';

echo "</div>";

}


    $Id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0; 

    if ($do == 'main') {
      
    $user   = $userid;
    $prodect   = $Id;
  
    echo $user,$prodect;
    $stmt = $con->prepare("INSERT INTO 
   cart(iduser,idprodect)
VALUES(:zuser,:zprodect)");     
$stmt->execute(array(

'zuser' => $user,  
'zprodect' => $prodect

 ));     header('Location:cart.php?do=cart'); // Redirect To Dashboard Page

    ?>

         
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
             <img src="admin/imageUp/<?php echo $rows['image']?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->



  <!-- about section -->
  <?php
} elseif ($do == 'cart') { 

				                  	$stmt2 = $con->prepare("SELECT COUNT(id) FROM pay");

	       	                     $stmt2->execute();

		                           $countItems=  $stmt2->fetchColumn();
					
							            	//	 echo $countItems; 
                               if($countItems >=40){
                                echo"<div class='alert alert-danger'>","سلة المشتريات ممتلئة","</div>";
                               }



$getus = $con->prepare("SELECT cart.*,
                                prodect.name AS name,
                                prodect.id AS idp,
                                prodect.sort AS sort,
                                prodect.price AS price,
                                prodect.rest_count AS rest_count,
                                prodect.image AS image,
                                prodect.offer AS offer,
                                prodect.datailes AS datailes,
                                user.id AS user
                              
                                
                         FROM cart 
                          INNER JOIN prodect
                          ON 
                          prodect.id = cart.idprodect
                          INNER JOIN user
                          ON
                          user.id= cart.iduser
                         WHERE cart.iduser = $userid
                             ");
                             $getus->execute();
                             $get =$getus->fetchAll(); ?>
                             <section class="furniture_section layout_padding" id="update">
    <div class="container">
      <div class="heading_container">
        <h2>
    سلة المشتريات
        </h2>
       
      </div>
      <div class="row">
      
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
                  <span>₪</span> 
                  <?php
                  $offer= $gets['offer'] ;
                   if(!empty($offer)){
                  
                  echo $offer;
                  echo "  ","<del>", $gets['price'], "</del>","  ";
                    }else{
                      echo $gets['price'];
                    } ?>
                </h6>
                <?php  
              $c=  $gets['rest_count'];
            
                if($c ==0){?>
                غير متوفر
               <a href="cart.php?do=delate&id=<?php echo $gets['id']?>">
                حذف
                </a>
             <?php   }else{?>
              <a href="pay.php?do=main&id=<?php echo $gets['idp']?>">
                  اشتري الان
                </a>
              <a href="cart.php?do=delate&id=<?php echo $gets['id']?>">
                حذف
                </a>
              <?php }?>
                </div>
             
      <input class="form-check-input" type="checkbox" value="<?php echo $gets['id'] ?>" name="check_list[]" id="gridCheck1">
         
              
              
            </div>
          </div>
        </div>
     
        
        <?php   }  ?>
        
      
   
      </div>
      <a class="btn btn-info" href="pay_groub.php?do=cart">شراء</a>
      

</form>
    </div>
  </section>
 
<?php
}elseif($do="delate"){
  $Id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
  $stmt = $con->prepare("DELETE FROM cart WHERE id = :zid");

  $stmt->bindParam(":zid", $Id);

  $stmt->execute();
  header('Location:cart.php?do=cart');
}  ?>
 
  <!-- end contact section -->

 
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