<?php session_start();
if(!isset($_SESSION['username']))
    header('location: Views/404NF.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="3;url=../index.php?controller=Utilisateur&action=logged">
    <title>Welcome| E-Shopper</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<div class="container text-center">
    <div class="logo-404">
        <a href="../index.php?controller=Utilisateur&action=logged"><img src="../images/home/logo.png" alt="" /></a>
    </div>
    <div class="content-404">
        <h1><b>Welcome</b><?php echo " ".$_SESSION['username'];?></h1>
        <p>You will be redirected to Home page</p>
        <h2><a href="../index.php?controller=Utilisateur&action=logged">Redirect NOW</a></h2>
    </div>
</div>


<script src="../js/jquery.js"></script>
<script src="../js/price-range.js"></script>
<script src="../js/jquery.scrollUp.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.prettyPhoto.js"></script>
<script src="../js/main.js"></script>
</body>
</html>