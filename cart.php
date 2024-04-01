<?php
session_start();
require_once("Functions/dbcontroller.php");
$db_handle = new DBController();
 
if(!empty($_GET["action"]) or !empty($_POST["totalPrice"])) {
// productID
	// totalPrice
	// productNameInput
switch($_GET["action"]) {
	case "addDirect":
	if(!empty($_POST["totalPrice"])) {

		$img = $_POST['base64image']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$imageName = 'convertedImages/'.time().'img.png';
		file_put_contents($imageName , $data);

		$productByCode =  array();
		$itemArray = array($_POST["productID"]=>array('name'=>$_POST["productNameInput"], 'code'=>$_POST["productID"], 'quantity'=>1, 'price'=>$_POST["totalPrice"], 'image'=>$imageName ));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($_POST["productID"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($_POST["productID"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += 1;
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM orders WHERE orderid='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["orderid"]=>array('name'=>$productByCode[0]["ProductName"], 'code'=>$productByCode[0]["orderid"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["Price"], 'image'=>$productByCode[0]["Picture"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
	<head>
		<title>Product Configurator</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="shortcut icon" href="icons/favicon.png">
		<link href="icons/themify-icons/themify-icons.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
		<link href="css/custom.css" type="text/css" rel="stylesheet" />

	</head>
 
<BODY>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Product Configurator </a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="cart.php"> 
				<span class='badge badge-warning' id='lblCartCount'> <?=(isset($_SESSION["cart_item"]))?count($_SESSION["cart_item"]):0;?> </span>
				Cart</a></li> 
      <!-- <li ><a href="contact-us.php">Contact Us</a></li>  -->
    </ul>
  </div>
</nav>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>"  class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><span class="ti-close"></span></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
<div style="float:right;padding-top:30px;">
<a href="index.php" class="checkoutBtn" style="padding-right: 10px;"><span class="ti-back-left"></span> Back to Configurator </a>
<a href="checkout.php" class="checkoutBtn"><span class="ti-direction"></span> Check out</a>
</div>
</div>

<div id="product-grid">
	<div class="txt-heading">Popular Selected Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM orders ORDER BY orderid ASC limit 3");
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
</BODY>
</HTML>