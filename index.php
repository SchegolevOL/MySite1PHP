<?php
error_reporting(-1);
session_start();
include_once 'pages/functions.php';

if (isset($_POST['auth'])) {
    login($_POST['name'], $_POST['pass']);


    header("localhost: index.php?page=1");

}
if (isset($_GET['do']) && $_GET['do'] == 'exit') {
    if (!empty($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    header("localhost:index.php");

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <script defer src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script defer src="js/scripts.js"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row ">

        <header class="col-sm-12 col-md-12 col-lg-12">
          <?php include 'pages/menu.php';  ?>

            <?php if ($_GET['page']!=1) include_once('pages/home.php');?>

        </header>
    </div>

    <div class="row">
        <nav class="col-sm-12 col-md-12 col-lg-12">

        </nav>
    </div>
    <div class="row">
        <section class="col-sm-12 col-md-12 col-lg-12">
            <?php

            if(isset($_GET['page']))
            {
                $page=$_GET['page'];
                if($page == 1)include_once('pages/home.php');
                if($page == 2 && isset($_SESSION['user']))include_once('pages/upload.php');
                if($page == 3 && isset($_SESSION['user']))include_once('pages/gallery.php');
                if($page == 4)include_once('pages/registration.php');
            }

            ?>
        </section>
    </div>
</div>


</body>
</html>