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
/* explain Later */
if (isset($_POST['submit'])) {
 $pid = $_POST['productid'];
 $_SESSION['pid'] = $pid;

}
if (isset($_SESSION['pid'])) {
  // code...

$pidd = $_SESSION['pid'];
}
else
{
  echo "<script> window.location.href = 'products.php' </script>";
}

$product = $db->getproductbyId($pidd);
$productparts = $db->getproductparts($pidd);

$productarray = mysqli_fetch_array($product);

$productvariations = $db->getvariationbyproduct($pidd);
?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Edit Product - Product Configurator</title>
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
          <a class="nav-link d-block" href="login.html">
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
            <h2 class="tm-block-title d-inline-block">Edit Product</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="form-group mb-3">
              <label
              for="name"
              >Product Id
            </label>
            <h4> <?php echo $productarray['Id']; ?></h4>
           </div>
           <div class="form-group mb-3">
            <label
            for="name"
            >Product Name
            </label>
          <h4> <?php echo $productarray['ProductName']; ?></h4>
           </div>
        <div class="form-group mb-3">
          <label
          for="Price"
          > Default Price
        </label>
        <h4> <?php echo $productarray['Dprice']; ?></h4>
        </div>
       </div>
    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
      <div class="tm-product-img-edit mx-auto">
        <img src="uploads/<?php echo $productarray['Dpic']; ?>" alt="Product image" class="img-fluid d-block mx-auto">

      </div>

    </div>
    <div class="col-12">
      <a href="#addproductpart"><button  class="btn btn-primary btn-block text-uppercase">Add Product Part</button></a> <br>
      <a href="#addproductvar"> <button class="btn btn-primary btn-block text-uppercase">Add Product Variaton</button></a>
    </div>

  </div>


<br>
   <br>
      <center><h3 style="color: white;"> Product Parts </h3></center>
  <div class="row">
   
    

   <table class="table table-hover  tm-product-table" style="width: 100% !important;">
    <thead>
      <tr style="width: 100% !important;">
        <th scope="col">Part ID</th>
        <th scope="col">Part NAME</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody style="width: 100% !important;">
      <?php 
      while ($or = mysqli_fetch_array($productparts)) {

        ?>
        <tr>
          <td><b> <?php echo $or['PartId']; ?></b></td>
          <td><b><?php echo $or['PartName']; ?></b></td>
          <td> <form action="" method="post">
            <input type="hidden" name="partid" value="<?php echo $or['PartId']; ?>">
            <button name="deletepart">Delete Part</button>
          </form>
        </td>
      </tr>
    <?php    } ?>

  </tbody>
</table>
<br> <br>
  

</div>
<br> <br>
<center><h3 style="color:white;">Product Variations</h3></center>
<div class="row">
<table class="table table-hover  tm-product-table" style="width: 100% !important;">
  <thead>
    <tr style="width: 100% !important;">
      <th scope="col">ID</th>
      <th scope="col">Part ID</th>
      <th scope="col">Variation Name</th>
      <th scope="col">Variation Value</th>
      <th scope="col">Variation Price</th>
      <th scope="col">Variation Poic</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody style="width: 100% !important;">
    <?php 
    while ($ror = mysqli_fetch_array($productvariations)) {

      ?>
      <tr>
        <td><b> <?php echo $ror['VariationId']; ?></b></td>
        <td><b><?php echo $ror['PartId']; ?></b></td>
        <td><b> <?php echo $ror['VariationName']; ?></b></td>
        <td><b><?php echo $ror['VariationValue']; ?></b></td>
        <td><b> <?php echo $ror['VariationPrice']; ?></b></td>
        <td><b><img src="uploads/<?php echo $ror['VariationPic']; ?>" style="width: 50px; height: 50px;"></b></td>

        <td> <form action="" method="post">
          <input type="hidden" name="VariationId" value="<?php echo $ror['VariationId']; ?>">
          <button name="deletevar">Delete Variation</button>
        </form>
      </td>
    </tr>
  <?php    } ?>

</tbody>
</table>

</div>

<div class="row">
<div class="col-12 mt-1">
  <br><br>
 <center> <h3 style="color:white;">Add Product Part</h3></center>
</div>

<div id="addproductpart" class="tm-edit-product-row row">
  <div class="col-12 col-lg-12 col-md-12">
    <form action="" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
      <div class="form-group mb-3">
        <label
        for="name"
        >Product PartName
      </label>
      <input
      id="partname"
      name="partname"
      type="text"
      class="form-control validate"
      required
      />
    </div>
    <div class="form-group mb-3">
  <label
  for="Price"
  > Part Image</label>
  <input type="file" class="mb-1" name="file" required>

</div>

  </div>

  <div class="col-12">
    <button  type="submit" name="submitt" class="btn btn-primary btn-block text-uppercase">Add Product Part Now</button>
  </div>
</form>
<br>


<div class="col-12 mt-5">
 
  <br><br>
 <center> <h3 style="color:white;">Add Product Variation</h3></center>
</div>
</div>


<form action="" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
  <div class="col-12 col-lg-12 col-md-12">

    <div class="form-group mb-3">
      <label
      for="partid"
      >Part Id
    </label>
    <input
    id="partId"
    name="partid"
    type="number"
    class="form-control validate"
    required
    />
  </div>
  <div class="form-group mb-3">
    <label
    for="variationname"
    >Variation Name 
  </label>
  <select name="variationname">
    <option value="Material">Material</option>
    <option value="Color">Color</option>
    <option value="BackView">Back View</option>
    <option value="SideView">Side View</option>
  </select>

</div>
 
<div class="form-group mb-3">
  <label
  for="variationvalue"
  >Variation Value
</label>
<input
id="variationvalue"
name="variationvalue"
type="text"
class="form-control validate"
required
/>
</div>
<div class="form-group mb-3">
  <label
  for="Price"
  >Variation Price</label>
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
  > Variation Image</label>
  <input type="file" class="mb-1" name="file" required>

</div>


</div>

<div class="col-12">
  <button  type="submit" name="submittt" class="btn btn-primary btn-block text-uppercase">Add variation Now</button>
</div>
</form>


</div>

</div>
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

</script>
</body>

</html>
<?php 
if (isset($_POST['submitt'])) {



  $partname = $_POST['partname'];

if (isset($_FILES["file"]["name"])) {

    $filename = date('Y-m-d H.i.s');
    $name = $_FILES["file"]["name"];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $file_size = $_FILES['file']['size'];
    
    if (!empty($name)) {
      $location = 'uploads/';

      if  (move_uploaded_file($tmp_name, $location.$filename.'.'.$ext)){
        
        $filename = $filename.'.'.$ext;     

        $expensions= array("jpeg","jpg","png"); 
      if(in_array($ext,$expensions)=== false or $file_size > 5097152){
          echo "<script> window.alert('Only PNG or JPG expensions are allowed with size less then 5MB'); 
                </script>";
          exit;
      } 
        
  $result = $db->addproductpart($pidd , $partname, $filename );
  if ($result){
    echo "<script> window.alert('PArt Added Successfully');
    window.location.href ='edit-product.php';
    </script>";

}
 else{
   echo "<script> window.alert('Something went Wrong Please Try Again');
   window.location.href ='edit-product.php';
   </script>";
 }
  }
  else{
   echo "<script>  window.alert('error uploading file')
   window.location.href ='edit-product.php';
   </script>";
 }

}
}
else{
   echo "<script>  window.alert('no file selected')
   window.location.href ='edit-product.php';
   </script>";
 }
}



if (isset($_POST['submittt'])) {


  if (isset($_FILES["file"]["name"])) {

    $filename = date('Y-m-d H.i.s');
    $name = $_FILES["file"]["name"];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    if (!empty($name)) {
      $location = 'uploads/';

      if  (move_uploaded_file($tmp_name, $location.$filename.'.'.$ext)){
        $partid = $_POST['partid'];
        $variationname = $_POST['variationname'];
        
        $variationvalue = $_POST['variationvalue'];
        $variationprice = $_POST['price'];
        $ft = $filename.'.'.$ext;
        $result = $db->insertvariation($partid, $pidd,  $variationname, $variationvalue , $variationprice , $ft);
        if ($result){
          echo "<script> window.alert('Variation Added Successfully');
          window.location.href ='edit-product.php';
          </script>";
        }
      }

    } else {
      echo "<script> window.alert('Something went Wrong Please Try Again');
      window.location.href ='edit-product.php';
      </script>";
    }
  }


}






if (isset($_POST['deletepart'])) {



  $partid = $_POST['partid'];

  $result = $db->deletepart($partid);
  if ($result){
    echo "<script> window.alert('Part Deleted Successfully');
    window.location.href ='edit-product.php';
    </script>";
 }
  else{
   echo "<script> window.alert('Something went Wrong Please Try Again');
   window.location.href ='edit-product.php';
   </script>";
 }

}

if (isset($_POST['deletevar'])) {



  $Variationid = $_POST['VariationId'];

  $result = $db->deletevariation($Variationid);
  if ($result){
    echo "<script> window.alert('Variation Deleted Successfully');
    window.location.href ='edit-product.php';
    </script>";
 }
  else{
   echo "<script> window.alert('Something went Wrong Please Try Again');
   window.location.href ='edit-product.php';
   </script>";
 }

}
















?>