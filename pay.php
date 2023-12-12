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
              <li class="nav-item active" >
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
    $prodect   = $_POST['prodect'];
    $details   = $_POST['details'];
    $location   = $_POST['location'];
    $quantity   = $_POST['quantity'];
    $price   = $_POST['price'];
    $city   = $_POST['city'];
    $state   = $_POST['state'];
    $textF   = $_POST['textF'];
    $phoneF   = $_POST['phoneF'];
    $size   = $_POST['size'];
    
    $stmt = $con->prepare("INSERT INTO 
    pay(iduser,idprodect,details,location,city,state,textF,phoneF,quantity,price,size)
VALUES(:zuser,:zprodect,:zdetails,:zlocation,:zcity,:zstate,:ztextF,:zphoneF,:zquantity,:zprice,:zsize)");     
$stmt->execute(array(

'zuser' => $user,  
'zprodect' => $prodect, 
'zdetails' => $details,
'zlocation' => $location,  
'zcity' => $city, 
'zstate' => $state,
'ztextF' => $textF, 
'zphoneF' => $phoneF,
'zquantity' => $quantity, 
'zsize' => $size, 
'zprice' => $price


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
              شراء منتج
              </h2>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>"   method="post" name="pay" >
          <?php
          $stmt = $con->prepare("SELECT * FROM prodect where id=? ");

                        
                            $stmt->execute(array($Id));
                            $rows = $stmt->fetch();
                            $sort=$rows['sort'];
                            ?>
               
      
        <br>
        
              <div>
                <h3 ><?php echo $rows['name']?></h3> <h5 style="font-style: italic;"><?php 
                 $s = $con->prepare("SELECT * FROM sort where id=? ");
                 $s->execute(array($sort));
                 $r = $s->fetch();
              echo $r['name']?></h5>
        <?php
                  $offer= $rows['offer'] ;
                   if(!empty($offer)){
                  
                  echo $offer;
                  echo "  ","<del>", $rows['price'], "</del>","  ","&#8362;";
                    }else{
                      echo $rows['price'],"&#8362;";
                    } ?>
                <p><?php echo $rows['datailes']?></p><br>
              
             
                   <div class="item">
        <div class="buttons">
          <span class="delete-btn"></span>
          <span class="like-btn"></span>
        </div>
                 <div class="quantity">
                 <div class="row">
    <div class="col">
          <button class="plus-btn" type="button" name="button"><img src="plus.svg" alt="" /></button>
    </div>
          <div class="col">
          <input type="number" value="1" class="input-btn" name="quantity" placeholder="السعر" />
          </div>
          <div class="col">
          <button class="minus-btn" type="button" name="button"><img src="minus.svg" alt="" /></button>
    </div>
                 </div>
                
        </div>
        
        <div class="total-price" id="549">&#8362;<input type="number" name="price" class="result-btn" value="<?php
                  $offer= $rows['offer'] ;
                   if(!empty($offer)){
                  
                  echo $offer;
                 
                    }else{
                      echo $rows['price'];
                    } ?>"  placeholder="السعر الاجمالي" /></div>

      </div> 
    
                      <?php
                       $s=$rows['size'];
 if(!empty($s)){?>
                        <div class="form-check form-check-inline">
                        <?php
      $s=$rows['size'];
       $array = explode(',', $s);
         
        
        foreach($array as $r){?>
       <p>  <?php echo $r?>
       <input  class="form-check-input" type="radio" value="<?php echo $r?>" name="size">
      
     </p>
        <?php } ?>
        </div>      
        <?php }else{

          echo"لا يوجد حجم لهذه القطعة";
          $r=0;
 ?>  <input  class="form-check-input" type="hidden" value="<?php echo $r?>" name="size">

<?php
          
        } ?>
                
                <input type="hidden"  name="prodect" class="form-control" id="subject" value="<?php echo $rows['id']  ?>" >
                <input  type="hidden"  name="user" class="form-control" id="subject" value="<?php echo $userid;  ?>" >
                                   
              <textarea class="form-control" name="details"  id="exampleFormControlTextarea1" rows="3">اضف معلومات تود اضافتها</textarea>
                                  
              </div>
              <br>
              <div class="row">
                <span>عنوان الارسال</span>
    <div class="col">
                <input type="text" name="state"   placeholder="الدولة" />
             </div>
             <div class="col">
                <input type="text" name="city"   placeholder="المدينة" />
             </div>
             <div class="col">
                <input type="text" name="location"   placeholder="الحي" />
             </div>
</div>


              <span  onclick="myFunction()">ارسال لصديق</span>

              <div id="myDIV" style="display:none;">
              <div class="row">
    <div class="col">
                <input type="text" name="textF"   placeholder="اضف عبارة إهداء" />
             
              </div>
              <div class="col">
                <input type="text" name="phoneF"   placeholder="رقم هاتف" />
             
              </div></div>
              <div class="row">   اختر بطاقة اهداء
              <div class="col-md-6 col-lg-4">
             
          <div class="box">
            <div class="img-box">
              <img width="40%" src="images/im1.jpg" alt="">
              <input class="form-check-input" type="checkbox" style="font-size: 10pt; width:10pt" value="im2" name="check_list[]" id="gridCheck1">
     
            </div>
          </div>  </div>
          <div class="col-md-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img width="40%" src="images/im3.jpg" alt="">
              <input class="form-check-input" style="font-size: 10pt; width:10pt" type="checkbox" value="im1" name="check_list[]" id="gridCheck1">
     
            </div>
          </div>  </div>
            
</div>

           


</div></div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">عند الاستلام</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">paypal</label>
</div>
              <br>  <br>
              <div class="btn_box">
                <button type="submit" calss="btn " name="pay">
                شراء
                </button>
                
              </div>
            </form>
          </div>
       
        <div class="col-md-6">
          <div class="map_container">
            <div >
             <img src="admin/imageUp/<?php echo $rows['image']?>">
            </div>
            
          
  </section>


  <section class="contact_section  long_section">
    <div class="container">
    <div class="row">
      <hr>
        <div class="col-md-12">

          
           <br /> 
           <form action="<?php echo $_SERVER['PHP_SELF'] ?>"   method="post" name="rating" >
            
           <span   onclick="gfg(1).rating.submit()" 
                 class="star">★ 
           </span> 
           <span  type="submit"name="rating"  onclick="gfg(2).rating.submit()" 
                 class="star">★ 
           </span> 
           <span  type="submit" name="rating"  onclick="gfg(3).rating.submit()" 
                 class="star">★ 
           </span> 
           <span   name="rating"  onclick="gfg(4)" 
                 class="star">★ 
           </span> 
           <span  onclick="gfg(5)" 
                 class="star">★ 
           </span> 
           <h3 onclick="" id="output"> 
   
             </h3> 
       </div> 
     </form>
         
           </div>
         </div>
       </div>
       </section>

  <!-- end contact section -->
  <script>
    let stars =  
    document.getElementsByClassName("star"); 
let output =  
    document.getElementById("output"); 
  
// Funtion to update rating 
function gfg(n) { 
    remove(); 
    for (let i = 0; i < n; i++) { 
        if (n == 1) cls = "one"; 
        else if (n == 2) cls = "two"; 
        else if (n == 3) cls = "three"; 
        else if (n == 4) cls = "four"; 
        else if (n == 5) cls = "five"; 
        stars[i].className = "star " + cls; 
    } 
    output.innerText = "Rating is: " + n + "/5"; 
   
} 
  

function remove() { 
    let i = 0; 
    while (i < 5) { 
        stars[i].className = "star"; 
        i++; 
    } 
}
  </script>
  
  <script>
    function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
        var items = document.querySelectorAll('.item');

items.forEach(function(item) {
  var minusButton = item.querySelector('.minus-btn');
  var plusButton = item.querySelector('.plus-btn');
  var inputField = item.querySelector('.input-btn');
  var resultField = item.querySelector('.result-btn');  

  minusButton.addEventListener('click', function minusProduct() {
    var currentValue = Number(inputField.value);
    if (currentValue > 1) {
      inputField.value = currentValue - 1;
      var x =  <?php
                  $offer= $rows['offer'] ;
                   if(!empty($offer)){
                  
                  echo $offer;
                 
                    }else{
                      echo $rows['price'];
                    } ?>;
      resultField =  item.querySelector('.result-btn').value = x* inputField.value;
    } else inputField.value = 1

  });
<?php $qount= $rows['rest_count']?>
  plusButton.addEventListener('click', function plusProduct() {
    var currentValue = Number(inputField.value);
    if (currentValue < <?php echo  $qount?>) {
    inputField.value = currentValue + 1;
   var x = <?php
                  $offer= $rows['offer'] ;
                   if(!empty($offer)){
                  
                  echo $offer;
                 
                    }else{
                      echo $rows['price'];
                    } ?>;
   resultField = item.querySelector('.result-btn').value = Number(x)* Number(inputField.value);
  } else inputField.value = <?php echo  $qount?>
  });

});
const results = document.querySelectorAll('.result-btn');
let total = 0;

results.forEach((result) => {

  total += result.value

});

document.querySelector('.total-result-input').value = total;
    </script>

  <!-- about section -->
  <?php
} elseif ($do == 'pay') { 
$getus = $con->prepare("SELECT pay.*,
                                prodect.name AS name,
                                prodect.sort AS sort,
                                prodect.price AS price,
                                prodect.image AS image,
                                prodect.datailes AS datailes,
                                user.id AS user
                              
                                
                         FROM pay 
                          INNER JOIN prodect
                          ON 
                          prodect.id = pay.idprodect
                          INNER JOIN user
                          ON
                          user.id= pay.iduser
                         WHERE pay.iduser = $userid AND 
                         pay.status=0
                             ");
                             $getus->execute();
                             $get =$getus->fetchAll(); ?>
                             <section class="furniture_section layout_padding" id="update">
    <div class="container">
      <div class="heading_container">
        <h2>
 مشتريات تم طلبها
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
                  <span>₪</span> <?php echo $gets['price'] ?>
                </h6>
              </div>    </div>
                <a href="pay.php?do=stop&id=<?php echo $gets['id']?>">
                 الغي الطلب
                </a>
               
              </div>
            </div>
         
        <?php   }  ?>
        
      
  
      </div>
    </div>
    <?php
    $getus = $con->prepare("SELECT pay.*,
                                prodect.name AS name,
                                prodect.sort AS sort,
                                prodect.price AS price,
                                prodect.image AS image,
                                prodect.datailes AS datailes,
                                user.id AS user
                              
                                
                         FROM pay 
                          INNER JOIN prodect
                          ON 
                          prodect.id = pay.idprodect
                          INNER JOIN user
                          ON
                          user.id= pay.iduser
                         WHERE pay.iduser = $userid AND 
                         pay.status=3
                             ");
                             $getus->execute();
                             $get =$getus->fetchAll(); ?>
                             <section class="furniture_section layout_padding" id="update">
    <div class="container">
      <div class="heading_container">
        <h2>
 مشتريات قيد الشحن
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
              <h6>
              <?php echo $gets['place'] ?>
              </h6>
              <div class="price_box">
                <h6 class="price_heading">
                  <span>₪</span> <?php echo $gets['price'] ?>
                </h6>
              </div>    </div>
                <a href="pay.php?do=stop&id=<?php echo $gets['id']?>">
               تم الاستلام
                </a>
               
              </div>
            </div>
         
        <?php   }  ?>
        
      
  
      </div>
    </div>
<?php
    $getus = $con->prepare("SELECT pay.*,
                                prodect.name AS name,
                                prodect.sort AS sort,
                                prodect.price AS price,
                                prodect.image AS image,
                                prodect.datailes AS datailes,
                                user.id AS user
                              
                                
                         FROM pay 
                          INNER JOIN prodect
                          ON 
                          prodect.id = pay.idprodect
                          INNER JOIN user
                          ON
                          user.id= pay.iduser
                         WHERE pay.iduser = $userid AND 
                         pay.status=5
                             ");
                             $getus->execute();
                             $get =$getus->fetchAll(); ?>
                             <section class="furniture_section layout_padding" id="update">
    <div class="container">
      <div class="heading_container">
        <h2>
 مشتريات تم استلامها
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
                  <span>₪</span> <?php echo $gets['price'] ?>
                </h6>
                <a href="pay.php?do=amporf&id=<?php echo $gets['id']?>">
               اعتراض
                </a>
              </div>    </div>
              
               
              </div>
            </div>
         
        <?php   }  ?>
        
      
  
      </div>
    </div>
    <?php
    $getus = $con->prepare("SELECT pay.*,
                                prodect.name AS name,
                                prodect.sort AS sort,
                                prodect.price AS price,
                                prodect.image AS image,
                                prodect.datailes AS datailes,
                                user.id AS user
                              
                                
                         FROM pay 
                          INNER JOIN prodect
                          ON 
                          prodect.id = pay.idprodect
                          INNER JOIN user
                          ON
                          user.id= pay.iduser
                         WHERE pay.iduser = $userid AND 
                         pay.status=4
                             ");
                             $getus->execute();
                             $get =$getus->fetchAll(); ?>
                             <section class="furniture_section layout_padding" id="update">
    <div class="container">
      <div class="heading_container">
        <h2>
 مشتريات معترض  عليها
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
                  <span>₪</span> <?php echo $gets['price'] ?>
                  <h5>
              <?php echo $gets['amporf'] ?>
              </h5>
                </h6>
              
              </div>    </div>
              
               
              </div>
            </div>
         
        <?php   }  ?>
        
      
  
      </div>
    </div>
  </section>
  
<?php
}elseif($do==="amporf"){
  
  $Id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;?>

<section class="contact_section  long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <form action="amporf.php" method="post">
  <div class="form-check form-check-inline">
  <label class="form-check-label" for="inlineRadio2">تقديم اعتراض</label><br>
  <input class="form-check-input" type="text" name="text" id="inlineRadio2" ><br>
  <input class="form-check-input" type="file" name="image" id="inlineRadio2" >
  <input class="form-check-input" type="hidden" name="id" value="<?php echo $Id;?>" >
  
</div>
              <br>  <br>
              <div class="btn_box">
                <button type="submit" calss="btn " name="pay">
               تقديم اعتراض
                </button>
                
              </div>  
              </div>  
              </div>
            </form>
            <?php
  // $stmt = $con->prepare("UPDATE pay SET status = 4 WHERE id = ?");

 // $stmt->execute(array($Id));
 // $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' تم التفعيل</div>';
 // header('Location:pay.php?do=pay');

 

  ?>
<?php
}elseif($do==="stop"){
          $Id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
          $stmt = $con->prepare("UPDATE pay SET status=5 WHERE id = ?");

          $stmt->execute(array($Id));

     
        }elseif($do==="receipt"){
          $Id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
          $stmt = $con->prepare("UPDATE pay SET status=1 WHERE id = ?");

          $stmt->execute(array($Id));

        }
	} else {
		header('Location: login.php');
		exit();
	}
  ?>
   