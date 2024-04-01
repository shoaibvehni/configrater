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


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Configurator Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
   
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index-2.html">
                    <h1 class="tm-site-title mb-0">Product Configurator</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">
                                <i class="fas fa-shopping-cart"></i>
                                Products
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
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
               
               
                
                
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Recent Orders</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER ID.</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">LOCATION</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                  <?php 
                            while ($or = mysqli_fetch_array($orders)) {
                                 
                              ?>
                                <tr>
                                    <td><b> <?php echo $or['orderid']; ?></b></td>
                                    <td><b><?php echo $or['ProductName']; ?></b></td>
                                    <td><b><?php echo $or['Username']; ?></b></td>
                                    <td><b><?php echo $or['Contact']; ?></b></td>
                                    <td><b><?php echo $or['Location']; ?></b></td>
                                    <td><b><?php echo $or['Picture']; ?></b></td>
                                    <td><b><?php echo $or['Price']; ?></b></td>
                                </tr>
                             <?php    } ?> 
                            </tbody>
                        </table>
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
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    
</body>


</html>