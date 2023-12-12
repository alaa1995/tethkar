<?php

ob_start();
session_start();
include 'connect.php';
    if (isset($_SESSION['id'])) {
      $sessionUser = $_SESSION['id'];
		$getUser = $con->prepare("SELECT * FROM user WHERE id = ?");
		$getUser->execute(array($sessionUser));
		$info = $getUser->fetch();
		$userid = $info['id'];
       // echo $userid, "b";

	?> 
        <?php  
       

if($_SERVER['REQUEST_METHOD'] == 'POST'){//to run PHP script on submit
  
    if(!empty($_POST['check_list'])){
        // Loop to store and display values of individual checked checkbox.
        foreach($_POST['check_list'] as $selected){
        
          $user   = $userid;
          $prodect   = $selected;
      //   echo $prodect;
          $details   = $_POST['details'];
          $location   = $_POST['location'];
          $quantity   = $_POST['quantity'];
          $price   = $_POST['price'];
          $city   = $_POST['city'];
          $state   = $_POST['state'];
       //   echo $user, $prodect,$location;
          //echo $user,$prodect;
          $stmt = $con->prepare("INSERT INTO 
         pay(iduser,idprodect,location,city,state,details,price,quantity)
        VALUES(:zuser,:zprodect,:zlocation,:zcity,:zstate,:zdetails,:zprice,:zquantity)");     
        $stmt->execute(array(
        
        'zuser' => $user,  
        'zprodect' => $selected,
        'zlocation'=> $location,
        'zcity'=>$city ,
        'zstate'=>$state ,
        'zquantity'=>$quantity ,
        'zdetails'=>$details ,
        'zprice'=>$price 

        ));  
       // header('Location:cart.php?do=cart');
        echo"<div>";
echo"تمت عملية الشراء بنجاح";
        echo"</div>";
        }}
}}?>