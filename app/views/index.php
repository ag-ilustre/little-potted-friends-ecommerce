<?php session_start(); ?>

<?php require_once '../partials/header.php'; ?>

<div class="container">

  <!-- jumbotron -->
  <!-- <div class="jumbotron mx-0">
    <h1 class="display-4 text-center">FITNESS WEARABLES</h1>
    <p class="lead text-center">Wearables for Fitness Enthusiasts</p>
    <hr class="my-4">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat.</p>
    <p class="lead">
      <a class="btn-info btn-outline-info btn-lg jumbotron-btn text-center" href="#" role="button">BROWSE OUR CATALOG</a>
    </p>
  </div> -->
  <!-- /.jumbotron -->
<!-- 
  <div class="image-container">
    <div class="image-inner-container">
        <p class="overlay">This is the title</p>                                
        <img src="https://encrypted-tbn1.google.com/images?q=tbn:ANd9GcTz7kuw0RjhoLkIDMQB-oV_5J7zwn51UuV7Cr0PTY0dJgFNXj_n" />
        <div class="clear"></div>
    </div>
  </div> -->

  <div class="row text-center mb-4">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 col-md-12 mx-auto">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="image-container">
              <div class="image-inner-container">
                <h1 class="overlay mt-5 p-5 h1ofindex">Welcome to Our Shop</h1>
                <img class="d-block img-fluid home-background" src="../assets/images/bg1.jpeg.jpeg" alt="First slide">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="image-container">
              <div class="image-inner-container">
                 <div class="overlay mt-5 px-3 ml-1 text-left"><h1 class="m-0 p-1 h1ofindex">Free Shipping</h1><h1 class="m-0 p-1 h1ofindex">up to March 31, 2019*!</h1><br><small>*Terms & Conditions Apply</small></div>
                <img class="d-block img-fluid home-background" src="../assets/images/bg2.jpeg.jpeg" alt="Second slide">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="image-container">
              <div class="image-inner-container">
                <h1 class="overlay mt-5 p-3 slide3text h1ofindex">Start Your Collection</h1>
                <img class="d-block img-fluid home-background" src="../assets/images/bg3.jpg.jpg" alt="Third slide">
              </div>
            </div>
          </div>
        </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>       
    </div>
    <div class="col-lg-1"></div>    
  </div>
  <!-- /.row -->

  <div class="row text-center">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 col-md-12 text-center">
      <h3 class="text-center p-2 mb-3">Our Featured Collections</h3>
    </div>
  </div>

  <div class="row text-center">

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card">
        <img class="card-img-top p-1" src="../assets/images/minimalistpot.png" alt="">
        <div class="card-body">
          <h5 class="card-title productName">Hedgehog Cactus</h5>
        </div>
        <div class="card-footer">
          <a href="catalog.php" class="btn btn-info btnWider">VIEW CATALOG</a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card">
        <img class="card-img-top p-1" src="../assets/images/designerpot.png" alt="">
        <div class="card-body">
          <h5 class="card-title productName">Designer Pot</h5>
        </div>
        <div class="card-footer">
          <a href="catalog.php" class="btn btn-info btnWider">VIEW CATALOG<a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card">
        <img class="card-img-top p-1" src="../assets/images/rusticpot.png" alt="">
        <div class="card-body">
          <h5 class="card-title productName">Schlumbergera</h5>
        </div>
        <div class="card-footer">
          <a href="catalog.php" class="btn btn-info btnWider">VIEW CATALOG</a>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card">
        <img class="card-img-top p-1" src="../assets/images/triplepots.png" alt="">
        <div class="card-body">
          <h5 class="card-title productName">Fairy Washboards</h5>
        </div>
        <div class="card-footer">
          <a href="catalog.php" class="btn btn-info btnWider">VIEW CATALOG</a>
        </div>
      </div>
    </div>

  </div>
  <!-- /.row -->
</div>
<!-- end of container -->


    


<?php require_once '../partials/footer.php'; ?>