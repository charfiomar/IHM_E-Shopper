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
    <title>Bidding history | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/galleryUpload.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.php?controller=Utilisateur&action=logged"><img src="images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i><?php echo $_SESSION['username'];?></a></li>
                            <li><a href="index.php?controller=Annonce&action=list"><i class="fa fa-crosshairs"></i>View Ads</a></li>
                            <li><a href="Includes/logout.php"><i class="fa fa-lock"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="container"><!--SearchBar-->
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="nav nav-justified navbar-nav">
                    <form class="navbar-form navbar-search" role="search">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-search btn-default" disabled>
                                    <span class="glyphicon glyphicon-search"></span>
                                    <span class="label-icon">Search</span>
                                </button>
                            </div>
                            <input type="text" class="form-control">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-search btn-default">
                                    GO
                                </button>
                                <button type="button" class="btn btn-search btn-default">
                                    Advanced
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div><!--/SearchBar-->

</header>

<section id="advertisement">
    <div class="container">
        <img src="images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-sm-9 padding-right" >
            <div class="product-details"><!--product-details-->
                <div class="col-sm-6">
                    <div class="view-product">
                        <img src="images/annonces/<?=$pho->nomPh;?>" alt="" />
                    </div>
                </div>
                <div class="col-sm-6"><!--NOT BIDDER-->
                    <div class="product-information"><!--/product-information-->
                        <h2>Bidding History :</h2>
                        <?php if(count($enchs)!=0):
                        foreach($enchs as $ench):?>
                            <span style="font-size:small"><?=$ench->dateEn?><span style="font-size:small">$<?=$ench->sommeEn?></span></span><br>
                        <?php endforeach;?>
                        <?php else:?>
                        <span>There are No bidders yet, Be the first to bid.</span>
                        <?php endif;?>
                    </div><!--/product-information-->
                </div><!--/NOT BIDDER-->
            </div><!--/product-details-->
        </div>
    </div>
</div>

<footer id="footer"><!--Footer-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 ">
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



<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>