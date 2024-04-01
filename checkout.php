<?php
session_start();
require_once("Functions/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html>
<html lang="en">
    <head>
        <title>Product Configurator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="shortcut icon" href="icons/favicon.png">
        <link href="icons/themify-icons/themify-icons.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
        <style type="text/css">
            
* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
input{
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
#checkoutForm{
    padding-left: 100px;
    padding-right: 100px;
}
        </style>
    </head>
     
    <body> 
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Product Configurator </a>
            </div>
            <ul class="nav navbar-nav">
             <li class="active"><a href="index.php">Home</a></li>
            <li ><a href="cart.php"><span class='badge badge-warning' id='lblCartCount'> <?=(isset($_SESSION["cart_item"]))?count($_SESSION["cart_item"]):0;?> </span> Cart</a></li> 
            <!-- <li ><a href="contact-us.php">Contact Us</a></li>  -->
            </ul>
          </div>
        </nav>
 <?php if(!empty($_GET["postdata"])) {
      // $inserQuery = "INSERT INTO `varation`( `PartId`, `Productid`,   `VariationName`, `VariationValue`, `VariationPrice` , VariationPic) VALUES ('$PartId', '$Productid' , '$VariationName', '$VariationValue' , '$VariationPrice' , '$Variationpic')";
      if(!empty($_POST["name"])){
      foreach($_SESSION["cart_item"] as $key => $item){
        if(!empty($item["name"])){
        $inserQuery = "INSERT INTO 
                `orders`( 
                `ProductName`, `Username`,   `Contact`, `Location`, `Picture` , `Price`,`productID`
                  ) 
                VALUES 
                (
                '".$item["name"]."', '".$_POST["name"]."' , 
                '".$_POST["phone"]."', '".$_POST["address"]."' , 
                '".$item["image"]."' , '".$item["price"]."', '".$item["code"]."'
                )";
        $response = $db_handle->inserQuery($inserQuery);
        }
      }
      unset($_SESSION["cart_item"]);
    }
      if($response){ ?>
      <div class="container" id="checkoutForm">
        <div class="alert alert-primary" role="alert">
          Thanks For your order , You will be notified via email you provided about delivery details.
        </div> 
      </div>       
  <?php }

   }else{?>
      <form action="checkout.php?postdata=1" method="post">
        <div class="container" id="checkoutForm">
            
              <div class="col-50" >
                <h3>Payment</h3>
                <label for="fname">On Delivery</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Name" required>
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required> 
                <label for="email">Phone Number</label>
                <input type="number" id="phone" name="phone" min="0" required> 
                <label for="address"> Shipping Address</label>
                <textarea id="address" cols="130" name="address" ></textarea>   
               
              </div> 
            <input type="submit" value="Continue to checkout" class="btn">
            </div>
            
        </form> 
      <?php } ?>
  </body>
</html>