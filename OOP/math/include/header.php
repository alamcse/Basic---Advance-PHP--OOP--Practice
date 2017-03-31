<!DOCTYPE html>
<html lang="en">
    <head>
<!-- =============Meta, title, CSS, favicons, etc.======================== -->

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Bootstrap based responsive mulltilevel dropdown navigation menu with fascinating animations.">
        <meta name="keywords" content="HTML, CSS, JS, JavaScript, bootstrap, front-end, frontend, web development, menu, navigation, dropdown, hover, dropdownhover">
        <meta name="author" content="Ruslan Kyba">

        <title>Math helper</title>

<!--  <script type="application/x-javascript"></script> -->

<!--=====================scroll fixed menu bar================================-->


<style type="text/css">body, a#nolink{cursor: url("pointer/mypointer.cur")!important;}</style>



<!--end of scroll fixed menu bar-->

        <!-- Bootstrap core CSS -->
        <base href="http://localhost/math/" />
        <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="./bootstrap/css/bootstrap-theme.css" rel="stylesheet">

        <!-- Bootstrap Dropdown Hover CSS -->
        <link rel="stylesheet" href="./dropdown/css/animate.min.css">
        <link rel="stylesheet" href="./dropdown/css/bootstrap-dropdownhover.min.css">

        <!--Custom-css-files-->

        <link rel="stylesheet" href="./css/custom.css">
        <link rel="stylesheet" href="./css/newsbox.css">

        <!--Custom-css-files-->

<!--========================= JavaScript files================================================= -->

    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="dropdown/js/bootstrap-dropdownhover.js"></script>
    <script type="text/javascript" src="js/scrollfixed.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script src="ckeditorbasic/ckeditor.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/news/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="js/news/jquery.bootstrap.newsbox.js" type="text/javascript"></script>

    </head>

<body >
<div class="se-pre-con" style="background-image:url(images/cube.gif);"></div>
    <!--==================== Container====================== -->

<div class="container-full">
    

<!-- ========<div id="wrap">=============header starts==========================-->
    <section>
        <div class="clearfix">
            <div class="row-fluid">
                <div class="col-md-5"> 
                    <img class="img-responsive" src="images/logo8.png">
                </div>
                <div class="col-md-5">
                 
                </div>            
            
            <!-- ==================search bar starts===============-->
                <div class="col-md-2" >
                    <form action="" class="search-form">
                        <div class="form-group has-feedback">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" name="search" id="search" placeholder="search">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </form> 
                </div>

            <!-- end of search bar -->
       
            </div>
        </div>
    </section>

    <section>
           <!-- ====================================Navigation bar============================ -->
            <nav class="navbar-default" role="navigation" id="scrollfix">
                <div class="container-fluid">
            
            <!-- ============Brand and toggle get grouped for better mobile display============ -->

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-animations">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

            <!-- ===========Collect the nav links, forms, and other content for toggling===========-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-animations" data-hover="dropdown" data-animations="fadeInUp fadeInLeft fadeInUp fadeInRight">
                        <ul class="nav navbar-nav" id="nav">
                            <li><a style="padding:13px 20px 8px 20px;" href="index.php"<?php if ($pageName=="Home") echo 'id="current"'; ?>><span class="glyphicon glyphicon-home" style="font-size:25px;"></span></a></li> 
                            <li><a href="formula_category.php" <?php if ($pageName=="Formula") echo 'id="current"'; ?>>Formulas</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Converter<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" <?php if ($pageName=="Converter") echo 'id="current"'; ?>>Unit</a></li>
                                    <li><a href="#" <?php if ($pageName=="Converter") echo 'id="current"'; ?>>Currency</a></li>
                                </ul>
                            <li><a href="discussion.php">Discussion</a></li>
                            <li><a href="#" <?php if ($pageName=="Discussion") echo 'id="current"'; ?>>Dictionary</a></li>
                            <li><a href="#" <?php if ($pageName=="Discussion") echo 'id="current"'; ?>>Facts</a></li>
                            <li><a href="#" <?php if ($pageName=="Games") echo 'id="current"'; ?>>Games</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Others <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Theorems</a></li>
                                    <li><a href="#">Constants</a></li>
                                </ul>
                            </li>
                        </ul>      
                    </div><!-- navbar-collapse -->
                </div><!--container-fluid -->
            </nav><!--end of navigation bar -->
    </section>
  <!-- end of header-->
<br>

<!--======================loading the called class automativally=================-->

<?php 
spl_autoload_register(function($class){   
include($_SERVER["DOCUMENT_ROOT"] . "/math/classes/".$class.".php");

});
