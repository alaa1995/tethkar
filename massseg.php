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
  </style>
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
           
   
        if (isset($_SESSION['id'])) {
          $sessionUser = $_SESSION['id'];
            $getUser = $con->prepare("SELECT * FROM user WHERE id = ?");
            $getUser->execute(array($sessionUser));
            $info = $getUser->fetch();
            $userid = $info['id'];
   
         
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user   = $_POST['user'];
    $msg   = $_POST['msg'];

    
    $stmt = $con->prepare("INSERT INTO message(user,massseg)
VALUES(:zuser,:zmsg)");     
$stmt->execute(array(

'zuser' => $user,  
'zmsg' => $msg



 ));  
//echo "<h1>","تمت الاضافة بنجاح","</h1>";
             
                


echo'<div class="alert alert-success" role="alert"> تمت العملية بنجاح';

echo "</div>";

}


    $Id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0; 

    if ($do == 'main') {
    ?>
  <section class="contact_section  long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
             الرسائل
              </h2>
            </div>
            <?php  $stmt = $con->prepare("SELECT 
                                  *
                              FROM 
                              message
                              WHERE
                              user=$userid
                              
                               ");
                                $stmt->execute();
                                $g = $stmt->fetchAll();?>
 <?php  foreach($g as $gs) {?>
            <div class="alert alert-dark" role="alert">
 <?php echo $gs['massseg']?>
</div>

<?php
     }?> 
     <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    ارسال رسالة<br>
    <div class="input-group mb-3">
    <input class=" form-control" type="text" name="msg" id="inlineRadio1" >
    <input class="form-check-input" type="hidden" name="user" value="<?php echo $userid ?>">
  
</div>
    <button type="submit" calss="btn btn-info " name="pay">
              ارسال
                </button>
</form> </div></div>
     </section>

<?php	}} else {
		header('Location: login.php');
		exit();
	}
  ?>
   