<?php session_start();
if(isset($_SESSION['username']))
    header('location: Views/404NF.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Signup | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.php?controller=Acceuil&action=login"><img src="images/home/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="form" style="margin-top: auto;"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>New User Signup!</h2>
                    <form action="Includes/register.php" method="post">
                        <input type="text" placeholder="First Name" required/>
                        <input type="text" placeholder="Last Name" required/>
                        <?php if(!isset($_REQUEST['mailExists'])):?>
                        <input type="email" placeholder="E-mail" name="email" required/>
                        <?php else:?>
                        <input type="email" placeholder="E-mail exists" style="box-shadow:0 0 3px red" name="email" required/>
                        <?php endif;?>
                        <?php if(!isset($_REQUEST['usernameExists'])):?>
                        <input type="text" placeholder="Username" name="username" required/>
                        <?php else:?>
                        <input type="text" placeholder="Username exists" style="box-shadow: 0 0 3px red" name="username" required/>
                        <?php endif;?>
                        <input type="password" placeholder="Password (6 Characters minimum)" name="password" id="pass" pattern=".{6,}" title="Password must be 6 characters length minimum" required/>
                        <input type="password" placeholder="Password Confirmation" name="passwordc" id="passc" required/>
                        <div class="checkout-options">
                            <h3>Favourite products</h3>
                            <p>Subscribe now for your favourite categories</p>
                            <div class="checkbox-inline">
                                <ul class="nav">
                                    <?php foreach ($res as $cat):?>
                                        <li>
                                            <input type="checkbox" style="width: 0.5cm;height: 0.5cm;" name="categorie[]" value="<?=$cat->idCat;?>" title="<?=$cat->desCat;?>"><?=$cat->nomCat;?>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->


<footer id="footer"><!--Footer-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i> +216 53 526 592</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> contact@iit.ens.tn</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
</footer><!--/Footer-->

<script type="text/javascript" src="js/passwordConf.js"></script>
<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>