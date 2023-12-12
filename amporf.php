<?php
 include 'connect.php';
$id   = $_POST['id'];
$amporf   = $_POST['text'];
$image   = $_POST['image'];
//echo $id,$amporf;
$stmt = $con->prepare("UPDATE pay SET status = 4,amporf=?,image=? WHERE id = ?");

 $stmt->execute(array($amporf,$image,$id));
 $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' تم التفعيل</div>';
 header('Location:pay.php?do=pay');
 ?>