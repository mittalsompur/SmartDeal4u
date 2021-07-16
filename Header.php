<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SmartDeal4u</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic%7CPT+Gudea:400,700,400italic%7CPT+Oswald:400,700,300" rel="stylesheet" id="googlefont">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/prettyPhoto.css">
      <link rel="stylesheet" href="css/colpick.css">
      <link rel="stylesheet" href="css/revslider.css">
      <link rel="stylesheet" href="css/owl.carousel.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="icon" type="image/png" href="images/icons/icon.html">
      <link rel="apple-touch-icon" sizes="57x57" href="images/icons/apple-icon-57x57.html">
      <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-icon-72x72.html">
      <script src="../../../../ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script>        
         window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>');
      </script>
      <style id="custom-style">
		#content img {
			max-width: 100%;
			display: inline-block;
			height: auto;
			padding: 0px 16px 16px 0px;
		}
		#inner-header {
			padding-top: 15px;
		}
	  </style>
   </head>
   <body>
      <div id="wrapper">
         <header id="header" style="border-bottom: 1px solid gray;">
            <div id="header-top">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="header-top-left">
                           <ul id="top-links" class="clearfix">
							  <li><a href="Aboutus.php" title="Checkout"><span class="top-icon top-icon-check"></span><span class="hide-for-xs">About Us</span></a></li>
							  <li><a href="Contactus.php" title="Checkout"><span class="top-icon top-icon-check"></span><span class="hide-for-xs">Contact Us</span></a></li>
                              <li><a href="feedback.php" title="My Wishlist"><span class="top-icon top-icon-pencil"></span><span class="hide-for-xs">Feedback</span></a></li>
                           </ul>
                        </div>
						<div class="header-top-right">
                           <div class="header-text-container pull-right">
								<?php
									session_start();
									if(isset($_SESSION["username"]))
									{
								?>
									<p class="header-text">Welcome :
									<div class="btn-group dropdown-money">
                                       <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown"><span class="hide-for-xs"><?php echo $_SESSION["username"]; ?></span></button>
                                       <ul class="dropdown-menu pull-right" role="menu">
                                          <li>
											<a href="ManageUserPost.php"><span class="hide-for-xs">Manage Post</span></a>
										  </li>
                                          <li>
											<a href="Register.php"><span class="hide-for-xs">Manage Profile</span></a>
										  </li>
										  <li>
											<a href="Changepassword.php"><span class="hide-for-xs">Change Password</span></a>
										  </li>
										  <li>
											<a href="Logout.php"><span class="hide-for-xs">Logout</span></a>
										  </li>
                                       </ul>
                                    </div>
                                </p>
								<?php
									}
									else
									{
								?>
									<p class="header-text">Welcome to SmartDeal4u!</p>
									<p class="header-link"><a href="Login.php">Login</a>&nbsp;or&nbsp;
									<a href="Register.php">Register</a></p>
								<?php
									}
								?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="inner-header">
               <div class="container">
                  <div class="row">
                     <div class="col-md-3 col-sm-3 col-xs-12 logo-container">
                        <h1 class="logo clearfix"><a href="index.php" title="SmartDeal4u"><img src="images/logo1.png" alt="SmartDeal4u" width="238" height="76"></a></h1>
                     </div>
                     <div class="col-md-9 col-sm-9 col-xs-12 header-inner-left" style="margin-top: 20px;">
                        <div class="contact-phones pull-left clearfix">
                           <form class="form-inline quick-search-form" method="post" action="search.php">
								<div class="form-group">
									<input type="text" name="txtSearch" class="form-control" placeholder="Search here" style="width: 490px;margin-right: -5px;">
								</div>
								<input type="submit" name="btnSearch" value="" class="btn btn-custom" style="background-image: url('images/sprites/sprite.png');background-position: 0 -116px;height: 35px;width: 35px;border: medium none;background-color: light-green;"/>
							</form>
                        </div>
						<div class="contact-infos pull-left">
                           <div class="dropdown-cart-menu-container pull-right">
							 <div class="btn-group dropdown-cart">
							 <?php
							    
									if(isset($_SESSION["userid"]))
									{
										?>
								    
									<a href="Addpost.php" class="btn btn-custom">Add Free Post</a>
									<?php
									}
								?>
							 </div>
						  </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>