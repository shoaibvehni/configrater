<?php

session_start();
require_once 'Functions/DB_Functions.php';
$db = new DB_Functions();
require_once("Functions/dbcontroller.php");
$db_handle = new DBController();

$allproducts = $db->getproducts();
$allproductss = $db->getproducts();

if (isset($_POST['choose'])) {
    $currentproductid = $_POST['prId'];
    $product = $db->getproductbyId($currentproductid);
    if ($product) {
        $row = mysqli_fetch_array($product);
        if (!$row) {
            // Handle the case where the query returned no rows
            echo "No product found with ID: $currentproductid";
        }
    } else {
        // Handle the case where the query failed
        echo "Failed to retrieve product with ID: $currentproductid";
    }
} else {
    if ($allproducts) {
        $row = mysqli_fetch_array($allproducts);
        if (!$row) {
            // Handle the case where $allproducts is empty
            echo "No products found";
        } else {
            $currentproductid = $row['Id']; 
        }
    } else {
        // Handle the case where the query failed
        echo "Failed to retrieve all products";
    }
}
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Marius</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="shortcut icon" href="icons/favicon.png">
		<link href="icons/themify-icons/themify-icons.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
		

	</head>
	 
	<body onload="myFunction()"> 
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" >Marius Product Configurator </a>
		    </div>
		    <ul class="nav navbar-nav">
		     <li class="active"><a href="index.php">Home</a></li>
      		<li ><a href="cart.php"><span class='badge badge-warning' id='lblCartCount'> <?=(isset($_SESSION["cart_item"]))?count($_SESSION["cart_item"]):0;?> </span> Cart</a></li> 
      		<!-- <li ><a href="contact-us.php">Contact Us</a></li>  -->
		    </ul>
		  </div>
		</nav>
		 
		<div id="sk-circle" class="sk-circle">
		  <div class="sk-circle1 sk-child"></div>
		  <div class="sk-circle2 sk-child"></div>
		  <div class="sk-circle3 sk-child"></div>
		  <div class="sk-circle4 sk-child"></div>
		  <div class="sk-circle5 sk-child"></div>
		  <div class="sk-circle6 sk-child"></div>
		  <div class="sk-circle7 sk-child"></div>
		  <div class="sk-circle8 sk-child"></div>
		  <div class="sk-circle9 sk-child"></div>
		  <div class="sk-circle10 sk-child"></div>
		  <div class="sk-circle11 sk-child"></div>
		  <div class="sk-circle12 sk-child"></div>
		</div>
		<!--end spinner loader  --> 
		<div id="catalog" class="container-fluid animate-bottom"  > 
			<div class="row"> 
				<div class="col-sm-12"> 
				<nav class="navbar navbar-fixed-left navbar-minimal animate">
					<div class="navbar-toggler animate">
						<span class="menu-icon ti-plus"></span>
					</div>
					<ul class="navbar-menu animate">
						<li>
							<a id="zoomIn" class="animate">
								<span class="ti-plus"></span>
							</a>
						</li>
						<li>
							<a id="zoomOut" class="animate">
								<span class="ti-minus"></span>
							</a>
						</li>
						<li>
							<a data-toggle="tooltip" data-placement="right" title="" class="animate activefront" data-original-title="front view">
								<span class="ti-angle-up"></span>
							</a>
						</li>
						<li>
							<a data-toggle="tooltip" data-placement="right" title="" class="animate activeside" data-original-title="side view">
								<span class="ti-angle-right"></span>
							</a>
						</li>
						<li>
							<a data-toggle="tooltip" data-placement="right" title="" class="animate activetop" data-original-title="back view">
								<span class="ti-angle-down"></span>
							</a>
						</li>
					</ul>
				</nav>
		<div class="row"> 
			<div class="box-view">
				<div class="col-sm-8"> 
					<div class="row">
						<div class="col-sm-12">
							<div id="product-grid">
						<div class="txt-heading">Past User Experience</div>
						<?php 
								$product_array = $db_handle->runQuery("SELECT * FROM orders join products pr on orders.productID = pr.Id
					Where pr.Id = ".$currentproductid."
					 ORDER BY orderid DESC limit 3");
								if (!empty($product_array)) { 
									foreach($product_array as $key=>$value){
								?>
									<div class="product-item">
										<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["orderid"]; ?>">
										<div class="product-image"><img class="img-responsive" src="<?php echo $product_array[$key]["Picture"]; ?>"></div>
										<div class="product-tile-footer">
										<div class="product-title"><?php echo $product_array[$key]["ProductName"]; ?></div>
										<div class="product-price"><?php echo "$".$product_array[$key]["Price"]; ?></div>
										<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
										</div>
										</form>
									</div>
								<?php
									}
								}
								?>
							</div>
						</div>
						<div class="col-sm-12">
							<?php
	                   $partcount = 0;
			         if ($partcount < 2) {
			         	 ?>
	                
			          <div id="desk-sx" class="front-view col-sm-12 col-md-8 tail">
						<img id="<?php echo $currentproductid; ?>" src="AdminDashboard/uploads/<?php echo $row['Dpic']; ?>" alt="" class="img-responsive"/>
						
					</div>
				<?php }
				else {
				?>
					
					<div id="desk-sx" class="front-view col-sm-12 col-md-8 tail">
						 <?php while($prow = mysqli_fetch_array($cproductparts)){
	                         $mresult = $db->getmetrialvariation($prow['PartId']);
	                         
	                         
						  ?>
						<img id="<?php echo $prow['PartName']; ?>" src="AdminDashboard/uploads/<?php echo $prow['partpic']; ?>" alt="" class="img-responsive"/>
						
	             <?php }
	             }

	             ?>		
					</div>
					<!-- side view -->
					<?php
$img = '';
$sideViewImgs = $db->getSideView($currentproductid);

if ($sideViewImgs) {
    $vc = mysqli_num_rows($sideViewImgs);
    if ($vc < 2) {
        $row23 = mysqli_fetch_array($sideViewImgs);
        if (!empty($row23)) {
            $img = '<img id="' . $currentproductid . '" src="AdminDashboard/uploads/' . $row23['VariationPic'] . '" alt="" class="img-responsive"/>';
        }
    } else {
        while ($fates = mysqli_fetch_array($sideViewImgs)) {
            $img .= '<img id="' . $fates['PartName'] . '" src="AdminDashboard/uploads/' . $fates['VariationPic'] . '" alt="" class="img-responsive"/>';
        }
    }
} else {
    // Handle the case where $sideViewImgs is null (query failed)
    echo "Failed to retrieve side view images for product ID: $currentproductid";
}
?>

					<div id="desk-sx-side" class="side-view col-sm-12 col-md-8 tail" style="display: none;">
						<?=$img;?>
					</div>
					<!-- back view -->
					<?php
$img = '';
$backViewImgs = $db->getBackView($currentproductid);

if ($backViewImgs) {
    $vc1 = mysqli_num_rows($backViewImgs);
    if ($vc1 < 2) {
        $rowss = mysqli_fetch_array($backViewImgs);
        if (!empty($rowss)) {
            $img = '<img id="' . $currentproductid . '" src="AdminDashboard/uploads/' . $rowss['VariationPic'] . '" alt="" class="img-responsive"/>';
        }
    } else {
        while ($prow23 = mysqli_fetch_array($backViewImgs)) {
            $img .= '<img id="' . $prow23['PartName'] . '" src="AdminDashboard/uploads/' . $prow23['VariationPic'] . '" alt="" class="img-responsive"/>';
        }
    }
} else {
    // Handle the case where $backViewImgs is null (query failed)
    echo "Failed to retrieve back view images for product ID: $currentproductid";
}
?>

					<div id="desk-sx-back" class="back-view col-sm-12 col-md-8 tail" style="display: none;">
						<?=$img;?>
					</div>
						</div>
					</div> 
				</div>
				<div class="col-sm-4">
					<div id="desk-dx" class="col-sm-12 col-md-12">
						<div id="desk-dx-top" class="col-sm-12 catalog">
							<div id="mySidenav-13" class="sidenav-13">
								<div class="top-logo col-xs-12">
									<!-- <h3>Product Configurator </h3> -->
								</div>					
								<div onclick="closeNav13()" class="top-nav push-active col-xs-6">
									<span class="ti-angle-left"></span><span class="tab-space">Back</span>
								</div>	
								<div class="top-nav-name col-xs-12" data-toggle="collapse">
									<span id="productnamecontainer"><?php echo $row['ProductName']; ?></span>
								</div>
								<?php   
								while($or = mysqli_fetch_array($allproductss)){
									
								 ?>
								<div data-toggle="tooltip" title="<?php echo $or['ProductName']; ?> " class="col-xs-6 product-tail frame">
									<form method="post" action="">
									<img class="image-responsive" alt="abcs" src="AdminDashboard/uploads/<?php echo $or['Dpic']; ?>"/>
	                                <input type="hidden" name="prId" value="<?php echo $or['Id']; ?>">
									<button class="btn btn-primary" name="choose">Select Item</button>
									</form>
								</div>
								<?php
							}
								?>
								
							</div>
							<div id="mySidenav" class="sidenav">
								<div class="top-logo col-xs-12">
									<img src="icons/favicon.png" width="50%">
								
								</div>
								<div class="top-nav col-xs-6">
									<span><?php echo $row['ProductName']; ?></span>
								</div>
								<div id="product" onclick="openNav13()" class="top-nav-name col-xs-6" data-toggle="collapse">
									<span>Catalog</span>
								</div>
								<div class="top-nav col-xs-6">
									<span>Configurator</span>
								</div>
								<div onclick="opensummary()" class="top-nav push-active col-xs-6">
									<span>Summary</span>
								</div>
								<ul class="list-group row">
								<?php	
								$cccproductparts =$db->getproductparts($currentproductid);
								
								while($mprow = mysqli_fetch_array($cccproductparts)){ //print_r($mprow); exit; ?>

									<li id="<?php echo $mprow['PartId'];?>" onclick="openpartmaterial(this.id)" class="list-group-item col-xs-12">
										<span class="chat-img pull-left">
											<img width="50" class="img-responsive" alt="" src="AdminDashboard/uploads/<?php echo $mprow['partpic']; ?>">
										</span>
										<span></span>
										<span class="tab-space"><?php echo $mprow['PartName']; ?> Material</span><span class="ti-angle-right"></span>
									</li>		
									<?php } ?>	
									<li onclick="opencolors()" class="list-group-item col-xs-12">
										<span class="chat-img pull-left">
											<img width="50" class="img-responsive" alt="" src="icons/icon-3.svg">
										</span>
										<span>Colors</span>
									<span class="tab-space"></span><span class="ti-angle-right"></span>
									</li>
								</ul>
							</div>
							<div id="mySideNav-2" class="">

								<div onclick="closeNav4()" class="top-nav col-xs-6">
									<span  class="ti-angle-left"></span><span class="tab-space"></span>
									<span >Parts</span>
								</div>
								<div onclick="opensummary()" class="top-nav push-active col-xs-6">
									<span>Summary</span>
								</div>
								<ul class="list-group row" id="materials">
									
								</ul>
							</div>
							
							<div id="mySidenav-4" class="sidenav-4">         
								<div onclick="closeNav4()" class="top-nav push col-xs-6">
									<span class="ti-angle-left"></span><span class="tab-space"></span>
									<span>Colors </span>
								</div>
								<div onclick="opensummary()" class="top-nav push-active col-xs-6">
									<span>Summary</span>
								</div>
								<ul class="list-group row">
											<?php
											// echo $currentproductid; exit;
								$cccdproductparts =$db->getproductparts($currentproductid);
								while($mmprow = mysqli_fetch_array($cccdproductparts)){ ?>
									<li id="<?php echo $mmprow['PartId'];?>" onclick="openpartcolors(this.id)" class="list-group-item col-xs-12">
										<span class="chat-img pull-left">
											<img width="50" class="img-responsive" alt="" src="AdminDashboard/uploads/<?php echo $mmprow['partpic']; ?>">
										</span>
										<span></span>
										<span class="tab-space"><?php echo $mmprow['PartName']; ?> Colors</span><span class="ti-angle-right"></span>
									</li>		
									<?php } ?>			
								</ul>
							</div>
							<div id="mySidenav-5" class="sidenav-5">
								<div onclick="closeNav5()" class="top-nav push col-xs-6">
									<span class="ti-angle-left"></span><span class="tab-space"></span>
									<span>colors</span>
								</div>
								<div onclick="opensummary()" class="top-nav push-active col-xs-6">
									<span>Summary</span>
								</div>
								<ul class="list-group row" id="colorvar">
									
								</ul>
							</div>
							
							
							
							<div id="mySidenav-7" class="sidenav-7">
								<div onclick="closeNav7()" class="top-nav push-active col-xs-6">
									<span class="ti-angle-left"></span><span class="tab-space"></span>
									<span>Back</span>
								</div>
								<div class="top-nav col-xs-6">
									<span>Summary</span>
								</div>
								<br>
								<br>
								<h4> Price with Variation </h4>
								<form method="post" id="cart_form" action="cart.php?action=addDirect&code=1" enctype="multipart/form-data">
								<ul class="list-group row" id="test">
									
								<?php 
								$csdproductparts = $db->getproductparts($currentproductid);
								$partIDs = array();
								while($porow = mysqli_fetch_array($csdproductparts)){
									array_push($partIDs, $porow['PartId']);
								?>
								     
									<li onclick="" class="list-group-summary col-xs-8" >
										<span class="chat-img pull-left">
											<span class="tab-space"></span>
										</span>
											<?php echo $porow['PartName']; ?><br>
											<span class="list-group-code selectedparts" data-partid="<?php echo $porow['PartId']; ?>" id="varname<?php echo $porow['PartName']; ?>">no variation</span> 
										
									</li>
									<li  class="list-group-item col-xs-4 price" id="varprice<?php echo $porow['PartName']; ?>">
										0
									</li>
									<?php } ?>
									<input type="hidden" name="selectedParts" id="selectedParts" value="<?php echo implode(',',$partIDs);?>">
									<input type="hidden" name="productNameInput" id="productNameInput">
									<li style="line-height:35px;" class="total list-group-summary col-xs-8">
										<span class="chat-img pull-left">
											<span class="tab-space"></span>
										</span>
										Default Price:<br>
									</li>
									<?php $productt = $db->getproductbyId($currentproductid);
									$klrow = mysqli_fetch_array($productt); ?>
									<input type="hidden" name="productID" value="<?php echo $currentproductid ?>">
									<li id="dppp" class="list-group-item col-xs-4 price">
										<?php echo $klrow['Dprice']; ?> 
									</li>
	                                <li style="line-height:35px;" class="total list-group-summary col-xs-8">
										<span class="chat-img pull-left">
											<span class="tab-space"></span>
										</span>
										Total Price:<br>
									</li>
									<li id="totalprice" class=" list-group-item col-xs-4">
									</li>
									<input type="hidden" name="totalPrice">
								</ul>

								<div class="top-nav col-xs-6 push-active">
									<span class="ti-sharethis"></span><span class="tab-space"></span>
									<span id="someButton">Order</span>
								</div>
								<input type="hidden" name="base64image" form="cart_form" id="base64image">
								<div class="top-nav col-xs-6 push-active"> 
									<span class="ti-location-arrow"></span><span class="tab-space"></span>
									<a href="javascript:{}" onclick="document.getElementById('cart_form').submit();">add to cart</a>
									 
								</div>
								<div id="creadImageContainer" style="display: none;">

								</div>
								 	</form>
							</div>
						</div>					
					</div>
				</div>
					<!--end right column-->
					
				</div>  
						
			</div>
				
		</div>
	</div>
</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/summary.js"></script>
		<script src="js/views.js"></script>
		<script src="js/navigation.js"></script>
		<script src="js/utility.js"></script>
		<script src="js/divToImage.js"></script>
		
		<script type="text/javascript">
				
function openpartmaterial(id){
 
          var partid = id;
               $.ajax({
                    type: 'post',
                    url: 'loaddata.php',
                    data: {
                        partidd:partid,
                    },
                    success: function (response) {
                   	console.log(response);
                    $( '#materials' ).html(response);  // jquery...
                    }
                });
         	document.getElementById("mySidenav").style.width = "0%";
	        document.getElementById("mySidenav-2").style.width = "100%";

            }

		function opencolors() {

	document.getElementById("mySidenav").style.width = "0%";
	document.getElementById("mySidenav-4").style.width = "100%";
	}

            function openpartcolors(id){
 
          var partid = id;
               $.ajax({
                    type: 'post',
                    url: 'loaddata.php',
                    data: {
                        partidc:partid,
                    },
                    success: function (response) {
                    $( '#colorvar' ).html(response);
                    }
                });
         document.getElementById("mySidenav-4").style.width = "0%";
	     document.getElementById("mySidenav-5").style.width = "100%";

            }

            function closeNave() {
	document.getElementById("mySidenav-2").style.width = "0";
	document.getElementById("mySidenav").style.width = "100%";
	}
				

	function opensummary() {
		var days = document.getElementById('test').children;;
        var notes = 1;
		var price = 0;
		var j = 0;
        for (var i = 0; i < days.length; i++) {
         if(days[i].className == "list-group-item col-xs-4 price")
		 {
			//days[i].className
			notes = document.getElementsByClassName(days[i].className)[j].textContent; 
			notes = parseInt(notes);
			price = price + notes;
			j++;
		}
		else{
			
		}  
		  /* notes = parseInt(doc.childNodes[i].value);
		   price = price + notes;
          */
           } 
		document.getElementById("totalprice").innerHTML = price;
		$('input[name="totalPrice"]').val(price);
		document.getElementById("mySidenav").style.width = "0%";
	document.getElementById("mySidenav-7").style.width = "100%";
	//get selected varient id[s]
	var varients = $('.selectedparts');
	console.log(varients);
	var selcIDs = [];
	$.each(varients , function(key , val){ 
		selcIDs.push($(val).data('partid'));
	});
	$('#selectedParts').val(selcIDs.join());
  	// make a sigle image and create url
  	makeSingleImage();
  	$("#productNameInput").val($('#productnamecontainer').html());

	}
	 
	$('#someButton').click(function(){
		console.log($('#desk-sx').children());
		$.each($('#desk-sx').children() , function(key , val){
			console.log(val.src);
		});
	  // var images = $('.img1 img').attr(src);
	  // alert(images);      
	});

function makeSingleImage() {

var divsToJPG = new DivsToJPG($('#desk-sx'));
var url64 = divsToJPG.img.src;
$('#base64image').val(url64);

}

 

		</script>
 	<script src="C:\xamppoicx\htdocs\configurator-master\js\utility.js"></script>
	</body>	
</html>



