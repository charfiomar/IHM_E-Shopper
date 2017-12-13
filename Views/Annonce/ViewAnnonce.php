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
    <title><?=$ann->titreAnn?> | E-Shopper</title>
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
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="advertisement">
    <div class="container">
        <img src="images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-sm-9 padding-right">
            <div class="product-details"><!--product-details-->
                <div class="col-sm-6">
                    <div class="view-product">
                        <img src="images/annonces/<?=$pho->nomPh;?>" alt="" />
                    </div>
                </div>
                <?php if (!isset($_REQUEST['bid']) || ($_SESSION['usrId']==$ann->idUsr)):?>
                <div class="col-sm-6"><!--NOT BIDDER-->
                    <div class="product-information"><!--/product-information-->
                        <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                        <h2><?=$ann->titreAnn?></h2>
                        <p><?=$ann->descriptionAnn?></p>
                        <span>
                                    <span style="font-size: small">Current BID :</span>
									<span>US $<?=$ann->prixAnn?></span>
									<?php if($_SESSION['usrId']==$ann->idUsr):?>
                                    <button type="button" class="btn btn-fefault cart btn-group-justified" disabled>
										<i class="fa fa-shopping-cart"></i>
										PLACE A BID
									</button>
                                    <?php else:?>
                                    <a href="index.php?controller=Annonce&action=consult&id=<?=$ann->idAnn?>&bid=true">
                                        <button type="button" class="btn btn-fefault cart btn-group-justified">
										<i class="fa fa-shopping-cart"></i>
										PLACE A BID
                                        </button>
                                    </a>
                                    <?php endif;?>
                                    <button type="button" class="btn btn-fefault cart btn-group-justified">
										<i class="fa fa-shopping-cart"></i>
										VIEW BIDS HISTORY
									</button>
								</span>
                        <p><b>Availability:</b> <?=substr($ann->dateExpAnn,0,10)?></p>
                        <p><b>Condition:</b> <?=$ann->etatAnn?></p>
                        <p><b>Announcer:</b> <?=$usrnm->loginUsr?></p>
                    </div><!--/product-information-->
                </div><!--/NOT BIDDER-->
                <?php endif;?>
                <?php if (isset($_REQUEST['bid']) && $_SESSION['usrId']!=$ann->idUsr):?>
                <div class="col-sm-6"><!--BIDDER-->
                    <div class="product-information"><!--/product-information-->
                        <img src="images/product-details/bid.png" class="newarrival" alt="" />
                        <h2><?=$ann->titreAnn?></h2>
                        <p><?=$ann->descriptionAnn?></p>
                        <span>
							<span style="font-size: small">Current BID :</span>
                            <span>US $<?=$ann->prixAnn?></span>
                            <span style="font-size: medium;color: #595959">Min. bid amount : $<?=$ann->unitAnn?> (5% of initial price)</span>
                                <span style="font-size: xx-large">Your BID : $<input type="number" value="<?=$ann->unitAnn+$ann->prixAnn?>" min="<?=$ann->unitAnn+$ann->prixAnn?>" style="width: 25%;height: 80%"></span>
                                <a href="index.php?controller=Annonce&action=consult&id=<?=$ann->idAnn?>&bid=true">
                                        <button type="button" class="btn btn-fefault cart btn-group-justified">
										<i class="fa fa-shopping-cart"></i>
										BID
                                        </button>
                                    </a>
                            <button type="button" class="btn btn-fefault cart btn-group-justified">
										<i class="fa fa-shopping-cart"></i>
										VIEW BIDS HISTORY
									</button>
								</span>
                        <p><b>Availability:</b> <?=substr($ann->dateExpAnn,0,10)?></p>
                        <p><b>Condition:</b> <?=$ann->etatAnn?></p>
                        <p><b>Announcer:</b> <?=$usrnm->loginUsr?></p>
                    </div><!--/product-information-->
                </div><!--/BIDDER-->
                <?php endif;?>
            </div><!--/product-details-->

            <div class="recommended_items"><!--recommended_items-->
                <h2 class="title text-center">recommended items</h2>

                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                            $i = 0;
                            foreach($recom as $a):
                                $phot = $bdd->query("SELECT nomPh,descPh FROM photo WHERE idAnn =$a->idAnn ")->fetch(PDO::FETCH_OBJ);
                        ?>
                        <div class="item active">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/annonces/<?=$phot->nomPh;?>" alt="" style="height: 150px;"/>
                                            <h2>$<?=$a->prixAnn?></h2>
                                            <p><?=$a->titreAnn?></p>
                                            <a href="index.php?controller=Annonce&action=consult&id=<?=$a->idAnn?>"><button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>See details
                                                </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php   $i=$i+1;
                                if(i==3){break;}
                            endforeach; ?>
                        <?php
                            $i = 0;
                            foreach($recom as $a):
                                if(i==3 && i<6):
                                    $phot = $bdd->query("SELECT nomPh,descPh FROM photo WHERE idAnn =$a->idAnn ")->fetch(PDO::FETCH_OBJ);
                        ?>
                        <div class="item">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/annonces/<?=$phot->nomPh;?>" alt=""/>
                                            <h2>$<?=$a->prixAnn?></h2>
                                            <p><?=$a->titreAnn?></p>
                                            <a href="index.php?controller=Annonce&action=consult&id=<?=$a->idAnn?>"><button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>See details
                                                </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                endif;
                            $i = $i + 1;
                        endforeach;
                        ?>
                    </div>
                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div><!--/recommended_items-->

        </div>
    </div>
</div>

<footer id="footer"><!--Footer-->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-Shopper. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>