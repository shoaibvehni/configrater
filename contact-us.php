<!DOCTYPE html>
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
          
	 
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Product Configurator </a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li ><a href="cart.php"><span class='badge badge-warning' id='lblCartCount'> <?=(isset($_SESSION["cart_item"]))?count($_SESSION["cart_item"]):0;?> </span> Cart</a></li> 
      <!-- <li class="active"><a href="contact-us.php">Contact Us</a></li>  -->
    </ul>
  </div>
</nav>
 
<!-- banner section -->
<section class="xs-banner service-banner contet-to-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="xs-banner-content">
                    <h1 class="banner-sub-title wow fadeInLeft">Contact us</h1>
                    <h2 class="banner-title wow fadeInLeft" data-wow-duration="1.5s">GET IN TOUCH</h2>
                </div><!-- .xs-banner-content END -->
            </div>
            <div class="col-lg-6 align-self-end">
                <div class="inner-welcome-image-group">
                    <img src="images/innerWelcome/contact-bg.png" alt="hosting image">
                    <img src="images/innerWelcome/phone.png" class="banner-ico banner-ico-1" alt="phone icon">
                    <img src="images/innerWelcome/plane.png" class="banner-ico banner-ico-2" alt="phone icon">
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- End banner section -->

<!-- contact info section -->
<section class="xs-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="xs-heading wow fadeIn">
                 
                    <h3 class="heading-title">CONTACT <span>WITH US</span></h3>
                </div><!-- .xs-heading END -->
            </div>
        </div><!-- .row END -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-group wow fadeInUp">
                    <div class="contact-info-icon">
                        <img src="images/contact-info-icon-1.png" alt="contact info icon">
                    </div>
                    <h4 class="xs-title"><a href="#">Address</a></h4>
                    <span> Bhutta Arcade,Block C,</span>
                    <span> City Housing Jhelum</span>
                </div><!-- .contact-info-group END -->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-group wow fadeInUp active" data-wow-duration="1.5s">
                    <div class="contact-info-icon">
                        <img src="images/contact-info-icon-2.png" alt="contact info icon">
                    </div>
                    <h4 class="xs-title"><a href="#">Make a Call</a></h4>
                    <span>+92-336-0627290</span>
                    <span>+92-333-2972720</span>
                </div><!-- .contact-info-group END -->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-group wow fadeInUp" data-wow-duration="2s">
                    <div class="contact-info-icon">
                        <img src="images/contact-info-icon-3.png" alt="contact info icon">
                    </div>
                    <h4 class="xs-title"><a href="#">Send Mail</a></h4>
                    <a href="mailto:sales@unique-links.com.pk"> sales@unique-links.com.pk</a>
                
                </div><!-- .contact-info-group END -->
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- END contact info section -->

<!-- contact form section -->
<section class="xs-section-padding xs-bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="xs-heading wow fadeIn">
                    <h2 class="heading-sub-title">Have question?</h2>
                    <h3 class="heading-title">SEND <span>A MESSAGE</span></h3>
                </div><!-- .xs-heading END -->
            </div>
        </div><!-- .row END -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-form-group wow fadeInUp">
                    
                    <div  id="form-message-section">
                      
                    </div>
                    <form class="xs-form" id="" method="post" action="">
                        <div class="form-group">
                            <label id="errorlog" style="color: green; align-content: center;"></label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" name="name" placeholder="Name" id="xs_contact_name">
                            <input type="email" class="form-control" required="required" title="username@mail-server.com"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  name="email" placeholder="Email" id="xs_contact_email">
                            <input type="text" class="form-control"  required="required"  name="subject" placeholder="Subject" id="xs_contact_website">
                            <textarea name="message" placeholder="Message"  required="required" id="xs_contact_message" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="xs-btn-wraper">
                            <input type="submit" id="action-btn"  class="btn btn-primary btn-form" name="submit" value="Submit Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .container END -->
</section><!-- END contact form section -->
 
  
<!-- map section -->
<!-- <section class="pb-0 pt-0 xs-section-padding">
<div id="xs-map" class="xs-map wow fadeIn"></div>
</section>	 -->
<iframe style="width:100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.795927224634!2d73.09614131505504!3d33.58464744967362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df948974419acb%3A0xdb4e19b2a6446cba!2sUnique%20Links%20-%20Hosting%20Company%20in%20Pakistan!5e0!3m2!1sen!2s!4v1621596904864!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
   
</body>
</html>

<?php


if (isset($_POST['submit'])) {
    // code...




      $Name =$_POST['name'];
     $email = $_POST['email'];
     $subject = $_POST['subject'];
     $message = $_POST['message'];

     
     
    $conemail = "sales@unique-links.com.pk";
 
   require 'phpmailer/class.phpmaileroauth.php';

$mail = new PHPMailer; //From email address and name 
$mail->From = "sales@unique-links.com.pk"; 
$mail->FromName = "unique-links"; //To address and name 
$mail->addAddress($conemail);//Recipient name is optional

$mail->addReplyTo("sales@paypakearn.com", "Reply"); //CC and BCC 

$mail->isHTML(true); 
$mail->Subject = $subject; 
$mail->Body = "
<h3> New Contact Query</h3>
<br>
<p>Name : </p> ".$Name."<br>
<p>Email : </p> ".$email."<br>
<p>Message : </p> ".$message."<br>
"
 .
$message;



if(!$mail->send()) 
{
echo "<script>document.getElementById('errorlog').innerHTML = 'Message not Sent';</script>"; 
}  
else { echo "<script>document.getElementById('errorlog').innerHTML = 'Message Sent SuccessFully We Will Contact You Soon';</script>"; 
}


}
?>