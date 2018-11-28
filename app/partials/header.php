<?php session_start(); ?>

<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">


    <!-- external stylesheet -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <title>Fitness Wearables</title>

    <script type="text/javascript" src="../vendors/jquery/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 sticky-top">
      <a class="navbar-brand px-5" href="index.php">F : W</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse px-5" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php" id="nav-home">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="catalog.php" id="nav-catalog">CATALOG <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../controllers/cart.php" id="nav-cart"><i class="fas fa-shopping-cart"></i> CART <span id="cart"></span> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="nav-about_us">ABOUT US <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <!-- LOGIN / LOGOUT -->
           <?php 
              if(isset($_SESSION['email'])){ 
                echo "<li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>HELLO, ". STRTOUPPER($_SESSION['firstname']) . "!<span class='sr-only'>(current)</span></a>
                      <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='#'><i class='fas fa-list-ul'></i>   Your Orders</a>
                        <a class='dropdown-item' href='#'><i class='far fa-user'></i>   Your Profile</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='../controllers/process_logout.php'><i class='fas fa-sign-out-alt'></i>   LOGOUT</a>
                      </div>
                    </li>
                      ";
              } else {
                echo "<a class='nav-link' href='login.php'>LOGIN <span class='sr-only'>(current)</span></a>
                      </li>          
                      <li class='nav-item'>
                        <a class='nav-link' href='register.php' id='nav-register'>REGISTER <span class='sr-only'>(current)</span></a>
                      </li>
                      ";
              }     
            ?>  

          
         </form>
      </div>
    </nav>