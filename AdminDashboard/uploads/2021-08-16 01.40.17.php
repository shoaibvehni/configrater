<?php

session_start();
if (isset($_SESSION['loggedin'])) {
   

if ($_SESSION['loggedin'] == "yes") {

    
}
else {
    echo "
   <script> window.location.href ='login.php';</script>
";
}
}
else {
    echo "
   <script> window.location.href ='login.php';</script>
";
}


require_once '../Functions/DB_Functions.php';
$db = new DB_Functions();
$orders = $db->getorderlist();

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Product - Product Configurator</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="index-2.html">
          <h1 class="tm-site-title mb-0">Product Admin</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fas fa-tachometer-alt"></i> Dashboard
                <span class="sr-only">(current)</span>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link active" href="products.php">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="login.php">
                Admin, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Product Name
                    </label>
                    <input
                      id="name"
                      name="name"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                 
                  <div class="form-group mb-3">
                    <label
                      for="Price"
                      >Default Price</label>
                      <input
                      id="Price"
                      name="price"
                      type="number"
                      class="form-control validate"
                      required
                    />
                    
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="Price"
                      > Default Image</label>
                      <input type="file" class="mb-1" name="file">
                    
                  </div>
                 
                        
                  </div>
                  
              </div>
         
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
         <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>Project Configurator FYP Project </b> All rights reserved. 
          
      
        </p>
        </div>
    </footer> 

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>


</html>


<?php 
if (isset($_POST['submit'])) {
 


if (isset($_FILES["file"]["name"])) {

    $filename = date('Y-m-d H.i.s');
    $name = $_FILES["file"]["name"];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    if (!empty($name)) {
        $location = 'uploads/';

        if  (move_uploaded_file($tmp_name, $location.$filename.'.'.$ext)){
            $productname = $_POST['name'];
$defaultprice = $_POST['price'];
       $ft = $filename.'.'.$ext;     
    $result = $db->InsertProduct($productname , $ft , $defaultprice );
    if ($result){
      echo "<script> window.alert('product added succesfully');
                   window.location.href = 'products.php'
       </script>";
    }
        }

    } else {
        echo "<script> window.alert('Please Select File');
                   window.location.href = 'add-product.php'
       </script>";
    }
}
             
    
 }







?>