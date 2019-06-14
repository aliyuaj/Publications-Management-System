<?php
/**
 * Created by PhpStorm.
 * User: HP USER
 * Date: 1/2/2017
 * Time: 2:33 PM
 */
session_start(); ob_start();
include "$location"."includes/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 02 Oct 2013 12:14:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="NAERLS Publications, Agriculture extension resources">
    <meta name="author" content="NAERLS, ABU, Zaria">
    <link rel="shortcut icon" href="<?php echo $location.'img/naerls_logo.png';?>">
    <title><?php echo $title?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $location.'dist/css/signin.css';?>" rel="stylesheet">
    <link href="<?php echo $location.'dist/style.css';?>" rel="stylesheet">
    <link href="<?php echo $location.'dist/css/bootstrap.css';?>" rel="stylesheet">
    <link href="<?php echo $location.'dist/css/starter-template.css';?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <script src="<?php echo $location.'dist/jquery-2.1.3.min.js';?>"></script>
    <!-- If you'd like to support IE8 -->
    <link href="<?php echo $location.'assets/jquery.datetimepicker.css';?>" rel="stylesheet"/>

    <style type="text/css">
        .custom-date-style {
            background-color: red !important;
        }

        .input{
        }
        .input-wide{
            width: 500px;
        }

    </style>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>

    <![endif]-->
    <script>
        $(document).ready(function(){
            $(function(){
                $('.nav a').each(function() {
                    if ($(this).prop('href') == window.location.href) {
                        $(this).closest('li').addClass('active');
                    }
                });
            });


        })
    </script>
    <style type="text/css">
        .custom-date-style {
            background-color: red !important;
        }

        .input{
        }
        .input-wide{
            width: 500px;
        }

    </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="<?php echo $location.'img/naerl.png';?>" height="60px" style>Publications</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ></li>
                <li ><a href="<?php echo $location.'index.php';?>">Home</a></li>
                <li><a href="<?php echo $location.'about.php';?>">About</a></li>
                <li ><a href="<?php echo $location.'contact.php';?>">Contact</a></li>
                <?php
                if(isset($_SESSION['id'])){
                    echo'
                <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.ucwords($_SESSION['name']).'<b class="caret"></b></a>
					<ul class="dropdown-menu">
                <li class="dropdown-header"> <span class="glyphicon glyphicon-tasks"></span> My History</a></li>
                <li><a href='.$location.'mydownload.php ><span class="glyphicon glyphicon-download-alt"></span> Downloads</a></li>
                <li><a href='.$location.'myrequest.php ><span class="glyphicon glyphicon-registration-mark"></span> Requests</a></li>
                <li class="divider"></li>
                <li><a href='.$location.'changepassword.php ><span class="glyphicon glyphicon-eye-close"></span> Change Password</a></li>';
                    echo "<li><a href=$location".'logout.php'."><span class='glyphicon glyphicon-log-out'></span> Log Out</a></li>
            </ul>
            </li>";
                }else echo "<li><a href=$location".'user_login.php'.">Login</a></li>";
                ?>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="container" id="cc" >
    <div class="starter-template">
        <div class="row">