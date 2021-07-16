<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <a class="navbar-brand" href="index.html"><span>SmartDeal4u</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> 
					<?php
						session_start();
						if(isset($_SESSION["username"]))
						{
							echo $_SESSION["username"];
						}					
					?>		
					</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->
        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <!--<li><a class="ajax-link" href="index.html"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a></li>-->
						<li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a></li>
                        <li><a class="ajax-link" href="ManageCategory.php"><i class="glyphicon glyphicon-edit"></i><span> Manage Category</span></a></li>
						<li><a class="ajax-link" href="ManageSubCategory.php"><i
						class="glyphicon glyphicon-edit"></i><span> Manage SubCategory</span></a></li>
						
						<li><a class="ajax-link" href="VerifyUserPost.php"><i
						class="glyphicon glyphicon-edit"></i><span> Verify User Post</span></a></li>
						<li><a class="ajax-link" href="managefeedback.php"><i
						class="glyphicon glyphicon-edit"></i><span> Manage Feedback</span></a></li>
                        <li><a class="ajax-link" href="categorywiseReport.php"><i class="glyphicon glyphicon-list-alt"></i><span> Category wise Report</span></a>
                        </li>
						 <li><a class="ajax-link" href="citywise.php"><i class="glyphicon glyphicon-list-alt"></i><span>City wise Report</span></a>
                        </li>
						 <li><a class="ajax-link" href="Datewise.php"><i class="glyphicon glyphicon-list-alt"></i><span> Date wise Report</span></a>
                        </li>
						 <li><a class="ajax-link" href="pricewise.php"><i class="glyphicon glyphicon-list-alt"></i><span> Price wise Report</span></a>
                        </li>
						 <li><a class="ajax-link" href="Itemtype report.php"><i class="glyphicon glyphicon-list-alt"></i><span> Itemtype wise Report</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>
