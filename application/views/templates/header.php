<?php $pageTitle="Thomas Family Recipes" ; ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--LINKS-->
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
    <!--Web Fonts-->
    <link rel="stylesheet" href="https://www.thomasfamilyrecipes.net/css/normalize.css">
    <link rel="stylesheet" href="http://localhost/CodeIgniter-3.1.7/CodeIgniter-tfr/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://www.thomasfamilyrecipes.net/css/print.css" media="print">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon -->
    <link href="https://www.thomasfamilyrecipes.net/img/cupcake.ico" rel="shortcut icon" type="image/x-icon">
    <!-- Scripts -->
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="https://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
    <!--TITLE-->
    <title>
        <?php echo $pageTitle; ?>
    </title>

</head>


<body>

    <header class="main-header">
        <div class="column-wrapper clearfix">
            <h1 class="name"><a href="<?php echo base_url(); ?>"><?php echo $pageTitle; ?></a></h1>
            <ul class="main-nav">
                <li><a href="<?php echo site_url('recipes'); ?>">Recipes</a>
                </li>
                <li><a href="<?php echo site_url('create-recipe'); ?>">Create A Recipe</a>
                </li>
                <li><a href="<?php echo site_url('about-us'); ?>">About Us</a>
                </li>
                <li><a href="<?php echo site_url('gallery'); ?>">Gallery</a>
                </li>
            </ul>
        </div>
    </header>
    <!--/.main-header-->