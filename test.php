<!-- index.html -->
  
<!DOCTYPE html> 
<html> 
  <style>
    * { 
    margin: 0; 
    padding: 0; 
    box-sizing: border-box; 
} 
  
body { 
    min-height: 50vh; 
    display: flex; 
    align-items: center; 
    text-align: center; 
    justify-content: center; 
    background: hsl(137, 46%, 24%); 
    font-family: "Poppins", sans-serif; 
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
<head> 
    <meta charset="utf-8" /> 
    <title>Star Rating</title> 
    <meta name="viewport" 
          content="width=device-width,  
                   initial-scale=1" /> 
    <link rel="stylesheet" 
          href="styles.css" /> 
</head> 
  
<body> 

  <div class=" rating  ">
    <input  type="radio" id="star2" name="rating" value="2" /><label for="star2" disabled title="Sucks big tim">2 stars</label>
</div>
    <div class="card"> 
        <h1>JavaScript Star Rating</h1> 
        <br /> 
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>"   method="post" name="rating" >
         
        <span   onclick="gfg(1).rating.submit()" 
              class="star">★ 
        </span> 
        <span  type="submit"name="rating"  onclick="gfg(2)" 
              class="star">★ 
        </span> 
        <span  type="submit" name="rating"  onclick="gfg(3)" 
              class="star">★ 
        </span> 
        <span   name="rating"  onclick="gfg(4)" 
              class="star">★ 
        </span> 
        <span  onclick="gfg(5)" 
              class="star">★ 
        </span> 
        <h3 onclick="" id="output"> 
             تقيم
          </h3> 
    </div> 
  </form>
    <script src="script.js"></script> 
</body> 
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
    $.ajax({
            //the url to send the data to
            url: "ajax/url.ajax.php",
            //the data to send to
            data: {someInput : $someInput},
            //type. for eg: GET, POST
            type: "POST",
            //datatype expected to get in reply form server
            dataType: "json",
            //on success
            success: function(data){
                //do something after something is recieved from php
            },
            //on error
            error: function(){
                //bad request
            }
        });
} 
  

function remove() { 
    let i = 0; 
    while (i < 5) { 
        stars[i].className = "star"; 
        i++; 
    } 
}
  </script>
</html>
 <?php 
        include 'connect.php';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $rating   =  print$r;

      $stmt = $con->prepare("INSERT INTO 
     rating(rating)
  VALUES(:zrating)");     
  $stmt->execute(array(
    'zrating' => $rating
  ));

  }?>