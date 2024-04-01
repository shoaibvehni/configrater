<!DOCTYPE html>
<html lang="en">
  
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
$products = $db->getproducts();

if (isset($_POST['deleteproduct'])) {



  $productID = $_POST['productID'];

  $result = $db->deleteProduct($productID);
  if ($result){
    echo "<script> window.alert('Product Deleted Successfully');
    window.location.href ='products.php';
    </script>";
 }
  else{
   echo "<script> window.alert('Something went Wrong Please Try Again');
   window.location.href ='products.php';
   </script>";
 }

}

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page - Product Configurator</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    <link rel="stylesheet" href="css/templatemo-style.css">
  
  </head>

  <body id="reportsPage">
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
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Pic</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                            while ($or = mysqli_fetch_array($products)) {
                                 
                              ?>
                                <tr>
                                    <td><b> <?php echo $or['Id']; ?></b></td>
                                    <td><b><?php echo $or['ProductName']; ?></b></td>
                                    <td><b><?php  echo $or['Dprice']; ?></b></td>
                                    <td><b><?php ?> <img src="uploads/<?php echo $or['Dpic'];?>" width="50px" hieght="50px"> </b></td>
                                    <td>
                                      <b>
                                      <form action="edit-product.php" method="post">
                                        <input type="hidden" name="productid" value="<?php echo $or['Id']; ?>">
                                      <button name="submit">Edit Product</button>
                                      </form>
                                    </b>
                                    <b> 
                                        <form action="" method="post">
                                          <input type="hidden" name="productID" value="<?php echo $or['Id']; ?>">
                                          <button name="deleteproduct">Delete Product</button>
                                        </form> 
                                    </b>
                                  </td>
                                </tr>
                             <?php    } ?>
                  
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="add-product.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
            
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
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    
  </body>

</html>