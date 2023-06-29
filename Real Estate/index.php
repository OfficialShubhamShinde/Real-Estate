<!DOCTYPE html>
<html lang="en">
<?php
include '_dbconnect.php';
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome! | Real Estate Agency</title>

  <!-- 
    - favicon
  -->
  <!-- <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml"> -->

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>

<style>
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .modal-content {
    background-color: white;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
    border-radius: 10px;
    /* add this line */
  }


  .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }

  @media screen and (max-width: 600px) {
    #login-modal {
      width: 100%;
    }

    #login-modal .modal-content {
      width: 90%;
    }

    #login-modal img {
      width: 70px;
      height: 56px;
    }

    #login-modal input[type="email"],
    #login-modal input[type="password"] {
      width: 100%;
      max-width: none;
    }
  }

  .alert-success {
    position: fixed;
    top: 100px;
    right: 10px;
    width: 250px;
  }

  .alert-success .btn-close {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    z-index: 2;
    padding: 0.25rem 0.5rem;
  }

  .alert-success {
    position: fixed;
    top: 127px;
    right: 18px;
    width: 250px;
    padding: 15px;
    background-color: rgb(209, 231, 221);
    border: 1px solid rgb(183, 217, 202);
    color: rgb(20, 108, 67);
    border-radius: 5px;
  }

  .alert-danger {
    position: fixed;
    top: 100px;
    right: 10px;
    width: 250px;
  }

  .alert-danger .btn-close {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    z-index: 2;
    padding: 0.25rem 0.5rem;
  }

  .alert-danger {
    position: fixed;
    top: 127px;
    right: 18px;
    width: 250px;
    padding: 15px;
    background-color: rgb(248, 215, 218);
    border: 1px solid rgb(244, 194, 199);
    color: rgb(176, 42, 55);
    border-radius: 5px;
  }

  .close4 {
    float: right;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: 0.5;
  }

  .close:hover,
  .close:focus {
    color: #000;
    opacity: 0.75;
    text-decoration: none;
    cursor: pointer;
  }

  @media only screen and (max-width: 767px) {

    .hero-bg {
      height: 150px;
    }

    .hero-title {
      font-size: 24px;
      line-height: 30px;
    }

    .hero-form {
      margin-top: 20px;
    }

    .input-wrapper {
      margin-bottom: 10px;
    }

    .form-label {
      font-size: 14px;
      margin-bottom: 5px;
    }

    .form-select,
    .form-control {
      width: 100%;
    }

    .tab-btn {
      display: none;
    }

    .form-tab {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 20px;
    }

    .form-tab button {
      margin: 0 10px 10px;
      width: 80px;
      height: 30px;
      font-size: 14px;
      border-radius: 5px;
    }
  }

  .card-text {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    /* Adjust the number of lines to show */
    -webkit-box-orient: vertical;
  }
</style>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="overlay" data-overlay></div>
    <div class="header-bottom">
      <div class="container">

        <a href="#" class="logo">
          <img src="./assets/images/cLogo.png" width="70px" height="50px" alt="Homeverse logo">
        </a>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="./assets/images/cLogo.png" width="70px" height="50px" alt="Homeverse logo">

            </a>

            <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          <div class="navbar-bottom">
            <ul class="navbar-list">

              <li>
                <a href="index.php" class="navbar-link active" data-nav-link style="color: var(--orange-soda);">Home</a>
              </li>

              <li>
                <a href="about.php" class="navbar-link" data-nav-link>About</a>
              </li>

              <li>
                <a href="services.php" class="navbar-link" data-nav-link>Service</a>
              </li>

              <li>
                <a href="properties.php" class="navbar-link" data-nav-link>Property</a>
              </li>

              <li>
                <a href="contact.php" class="navbar-link" data-nav-link>Contact</a>
              </li>

            </ul>
          </div>

        </nav>

        <div class="header-bottom-actions">


          <button class="header-bottom-actions-btn" aria-label="Profile" data-tab-btn data-modal="#login-modal">
            <ion-icon name="person-outline" data-tab-btn data-modal="#login-modal"></ion-icon>

            <span>Profile</span>
          </button>



          <button class="header-bottom-actions-btn" data-nav-open-btn aria-label="Open Menu">
            <ion-icon name="menu-outline"></ion-icon>

            <span>Menu</span>
          </button>

        </div>

      </div>
    </div>

  </header>

  <?php

  if (isset($_GET['message'])) {
    $message = $_GET['message'];

    // display the alert message
    echo '<div class="alert alert-danger alert-dismissible fade show mt-3" id="alert" role="alert">
  <button type="button" class="close" onclick="closeAlert()" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Error!</strong> Invalid Credentials.
</div>';
  }

  if (isset($_POST['signUp'])) {
    $signInUuserName = $_POST['signInUuserName'];
    $userContactNo = $_POST['userContactNo'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userCPassword = $_POST['userCPassword'];

    if ($userPassword == $userCPassword) {
      $insertData2 = "INSERT INTO `users` (`name`, `cno`, `email`, `pass`) VALUES ('$signInUuserName', '$userContactNo', '$userEmail', '$userPassword')";
      $result2 = mysqli_query($conn, $insertData2);
      if ($result2) {
        echo '<div class="alert alert-success alert-dismissible fade show mt-3" id="alert" role="alert">
                  <button type="button" class="close" onclick="closeAlert()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>Success!</strong> Account Created Successfully.
                </div>';
      }
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show mt-3" id="alert" role="alert">
                <button type="button" class="close" onclick="closeAlert()" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong>Error!</strong> Password Not Match. Please try again.
              </div>';
    }
  }


  ?>



  <main>
    <article>

      <section class="section hero" aria-label="hero">
        <div class="container">

          <div class="hero-bg">
            <div class="hero-content">

              <h1 class="h1 hero-title">
                We will help you find your <span class="span">Wonderful</span> home
              </h1>
            </div>
          </div>

          <div class="hero-form-wrapper">
            <div class="form-tab" style="justify-content: center;">
              <button class="" style="justify-content: center;"><b>Buy</b></button>
              <button class="tab-btn" data-tab-btn></button>

              <button class="tab-btn ShowLogin" style="justify-content: center;"><b class="ShowLogin">Sell</b></button>

            </div>


            <!-- Login  -->
            <div id="login-modal" class="modal">
              <div class="modal-content">
                <button type="button" class="modal-close-btn">&times;</button>
                <center>
                  <h2>Login</h2>
                </center> <br>
                <form action="login.php" method="POST">
                  <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                    <img src="./assets/images/cLogo.png" alt="Your Logo" style="width: 100px; height: 80px;">
                  </div>
                  <div style="display: flex; flex-direction: column; align-items: center;">
                    <input type="email" id="email" name="loginEmail" placeholder="Email Id" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 80%; max-width: 400px; display: block; margin-bottom: 10px;">
                    <input type="password" id="password" name="loginPassword" placeholder="Password" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 80%; max-width: 400px; display: block; margin-bottom: 10px;">
                    <div style="text-align: center;">
                      <p style="display: flex; align-items: center; justify-content: center;"> <a href=""
                          style="color: var(--orange-soda); margin-left: 5px;">Forget Your Password</a></p>
                    </div>
                    <br>
                    <input type="submit" value="Login" name="login"
                      style="border-radius: 10px; background-color: var(--orange-soda); color: white; padding: 10px; border: none; cursor: pointer; display: block;">
                    <br>
                  </div>

                  <div style="text-align: center;">
                    <p style="display: flex; align-items: center; justify-content: center;"><a href="#"
                        id="create-account-btn" class="" style="color: var(--orange-soda); margin-left: 5px;">Don't Have
                        An Account</a></p>
                  </div>
                </form>
              </div>
            </div>


            <!-- Sign up  -->
            <div id="register-modal" class="modal">
              <div class="modal-content">
                <button type="button" class="modal-close-btn">&times;</button>
                <center>
                  <h2>Sign Up</h2>
                </center> <br>
                <form action="" method="POST">
                  <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                    <img src="./assets/images/cLogo.png" alt="Your Logo" style="width: 100px; height: 80px;">
                  </div>
                  <div style="display: flex; flex-direction: column; align-items: center;">
                    <input type="text" id="email" name="signInUuserName" placeholder="Enter Full Name" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 80%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <input type="number" id="email" name="userContactNo" placeholder="Enter Contact No" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 80%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <input type="email" id="email" name="userEmail" placeholder="Enter Email id" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 80%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <input type="password" id="password" name="userPassword" placeholder="Enter password" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 80%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <input type="password" id="password" name="userCPassword" placeholder="Confirm Password" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 80%; max-width: 400px; display: block; margin-bottom: 10px;">


                    <br>
                    <input type="submit" value="Signup" name="signUp"
                      style="border-radius: 10px; background-color: var(--orange-soda); color: white; padding: 10px; border: none; cursor: pointer; display: block;">
                    <br>
                  </div>

                  <div style="text-align: center;">
                    <p style="display: flex; align-items: center; justify-content: center;"><a href="#" id="login-link"
                        class="" style="color: var(--orange-soda); margin-left: 5px;">Already Have an Account</a>
                    </p>
                  </div>


                </form>


              </div>
            </div>





            <form action="sayNotLogin.php" class="hero-form">

              <div class="input-wrapper">
                <label for="exampleInputEmail1" class="form-label"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                      d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                  </svg> Search Here</label>
                <input type="search" class="form-control" id="searchBar" aria-describedby="search"
                  style="height: 30px; border-radius: 5px; border: 1px solid rgb(200, 200, 200);;">
              </div>

              <div class="input-wrapper">
                <label for="category" class="input-label">Select Categories:</label>

                <select class="form-select" aria-label="Default select example"
                  style="height: 30px; width: 200px; border-radius: 5px; border: 1px solid rgb(200, 200, 200);;">
                  <option selected></option>
                  <option value="1">Appartment</option>
                  <option value="2">Villa</option>
                  <option value="3">Office</option>
                  <option value="3">House</option>
                </select>
              </div>

              <div class="input-wrapper">
                <label for="category" class="input-label">Min Price:</label>

                <select class="form-select" aria-label="Default select example"
                  style="height: 30px; width: 200px; border-radius: 5px; border: 1px solid rgb(200, 200, 200);">
                  <option selected></option>
                  <option value="1">10000</option>
                  <option value="2">30000</option>
                  <option value="3">50000</option>
                </select>
              </div>

              <div class="input-wrapper">
                <label for="category" class="input-label">Max Price:</label>

                <select class="form-select" aria-label="Default select example"
                  style="height: 30px; width: 200px; border-radius: 5px; border: 1px solid rgb(200, 200, 200);;">
                  <option selected></option>
                  <option value="1">10000</option>
                  <option value="2">30000</option>
                  <option value="3">50000</option>
                </select>
              </div>

              <button class="btn btn-primary ShowLogin">Search now</button>

            </form>

          </div>
      </section>




      <!-- 
        - #ABOUT
      -->

      <section class="about" id="about">
        <div class="container">

          <figure class="about-banner">
            <img src="./assets/images/about-banner-1.png" alt="House interior">

            <img src="./assets/images/about-banner-2.jpg" alt="House interior" class="abs-img">
          </figure>

          <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">The Leading Real Estate Marketplace.</h2>

            <p class="about-text">
              Whether you're a seasoned investor or a first-time home buyer, The Leading Real Estate Marketplace
              provides the tools and expertise you need to succeed in today's dynamic real estate market.
            </p>

            <ul class="about-list">

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="home-outline"></ion-icon>
                </div>

                <p class="about-item-text">Smart Home Design</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="leaf-outline"></ion-icon>
                </div>

                <p class="about-item-text">Beautiful Scene Around</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="wine-outline"></ion-icon>
                </div>

                <p class="about-item-text">Exceptional Lifestyle</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="shield-checkmark-outline"></ion-icon>
                </div>

                <p class="about-item-text">Complete 24/7 Service</p>
              </li>

            </ul>

            <p class="callout">
              "Transforming the way people buy a properties, The Leading Real Estate Marketplace empowers
              individuals and businesses to make their real estate dreams a reality."
            </p>

            <a href="about.php" class="btn">Know More</a>

          </div>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="service" id="service">
        <div class="container">

          <p class="section-subtitle">Our Services</p>

          <h2 class="h2 section-title">Our Main Focus</h2>

          <ul class="service-list">

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-1.png" alt="Service icon">
                </div>

                <h3 class="h3 card-title">
                  <a href="services.php">Buy a home</a>
                </h3>

                <p class="card-text">
                  Discover your dream home with our extensive listings of properties for sale, featuring a range of
                  styles and locations to fit any budget or preference.
                </p>

                <a href="services.php" class="card-link">
                  <span>Buy A Home</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-2.png" alt="Service icon">
                </div>

                <h3 class="h3 card-title">
                  <a href="services.php">Buy a Office</a>
                </h3>

                <p class="card-text">
                  Find the perfect space for your business with our extensive listings of offices for sale, featuring a
                  range of sizes and locations to fit any industry or budget.
                </p>

                <a href="services.php" class="card-link">
                  <span>Buy a Office</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-3.png" alt="Service icon">
                </div>

                <h3 class="h3 card-title">
                  <a href="services.php">Buy a Flat</a>
                </h3>

                <p class="card-text">
                  Find your ideal living space with our extensive listings of flats for sale, featuring a range of sizes
                  and styles to fit any lifestyle or budget.
                </p>

                <a href="services.php" class="card-link">
                  <span>Buy A Flat</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #PROPERTY
      -->

      <section class="property" id="property">
        <div class="container">
          <br>

          <p class="section-subtitle">Properties</p>

          <h2 class="h2 section-title">Featured Listings</h2>

          <ul class="property-list has-scrollbar">
            <?php
            $sqlForProperties = "select * from property";
            $querySqlForProperties = mysqli_query($conn, $sqlForProperties);
            while ($fatchProperty = mysqli_fetch_assoc($querySqlForProperties)) {
              $srno = $fatchProperty['srno'];
              $city = $fatchProperty['city'];
              $ptype = $fatchProperty['ptype'];
              $pname = $fatchProperty['pname'];
              $location = $fatchProperty['plocation'];
              $sqft = $fatchProperty['sqft'];
              $bhk = $fatchProperty['bhk'];
              $age = $fatchProperty['age'];
              $furnishing = $fatchProperty['furnishing'];
              $floor = $fatchProperty['floor'];
              $tfloor = $fatchProperty['tfloor'];
              $describep = $fatchProperty['pdescribe'];
              $price = $fatchProperty['prise'];
              $available = $fatchProperty['available'];
              $img = $fatchProperty['img'];
              $sellername = $fatchProperty['sellername'];
              echo '
            <li>
              <div class="property-card">

                <figure class="card-banner">

                  <a href="#">
                    <img src="./assets/images/property-1.jpg" alt="New Apartment Nice View" class="w-100">
                  </a>

                  <div class="card-badge green">for Sales</div>

                  <div class="banner-actions">

                    <button class="banner-actions-btn">
                      <ion-icon name="location"></ion-icon>

                      <address>' . $location . '</address>
                    </button>

                    

                  </div>

                </figure>

                <div class="card-content">

                  <div class="card-price">
                    <strong>₹' . $price . '</strong>
                  </div>

                  <h3 class="h3 card-title">
                    <a href="bookProperty.php?srno=' . $srno . '">' . $pname . '</a>
                  </h3>

                  <p class="card-text" id="description">
  ' . $describep . '
</p>


                  <ul class="card-list">

                    <li class="card-item">
                      <strong>' . $bhk . '</strong>

                      <ion-icon name="bed-outline"></ion-icon>

                      <span>BHK Type</span>
                    </li>

                    <li class="card-item">
                      <strong>2</strong>

                      <ion-icon name="man-outline"></ion-icon>

                      <span>Bathrooms</span>
                    </li>

                    <li class="card-item">
                      <strong>' . $sqft . '</strong>

                      <ion-icon name="square-outline"></ion-icon>

                      <span>Square Ft</span>
                    </li>

                  </ul>

                </div>

                <div class="card-footer">

                  <div class="card-author">

                    <figure class="author-avatar">
                      <img src="./assets/images/user1.png" alt="William Seklo" class="w-100">
                    </figure>

                    <div>
                      <p class="author-name">
                        <a href="#">' . $sellername . '</a>
                      </p>

                      <p class="author-title">Estate Agents</p>
                    </div>

                  </div>

                  <div class="card-footer-actions">

                    <button id="id1" class="card-footer-actions-btn ShowLogin">
                      <ion-icon name="resize-outline"></ion-icon>
                    </button>

                    <button id="id2" class="card-footer-actions-btn ShowLogin">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>

                    <button id="id3" class="card-footer-actions-btn ShowLogin">
                      <ion-icon name="add-circle-outline"></ion-icon>
                    </button>

                  </div>

                </div>

              </div>
            </li>
            ';
            }

            ?>
          </ul>

        </div>
      </section>




      <section class="cta">
        <div class="container">

          <div class="cta-card">
            <div class="card-content">
              <h2 class="h2 card-title">Looking for a dream home?</h2>

              <p class="card-text">We can help you realize your dream of a new home</p>
            </div>

            <a href="properties.php"><button class="btn cta-btn">
                <span>Explore Properties</span>
                <ion-icon name="arrow-forward-outline"></ion-icon>
              </button></a>
          </div>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <!-- <img src="./assets/images/logo-light.png" alt="Homeverse logo"> -->
          </a>

          <!-- <p class="section-text">
            Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.
          </p> -->

          <ul class="contact-list">

            <li>
              <a href="#" class="contact-link">
                <ion-icon name="location-outline"></ion-icon>

                <address>ASDR Infotech, Baner, Pune</address>
              </a>
            </li>

            <li>
              <a href="tel:+0123456789" class="contact-link">
                <ion-icon name="call-outline"></ion-icon>

                <span>+0123-456789</span>
              </a>
            </li>

            <li>
              <a href="mailto:contact@homeverse.com" class="contact-link">
                <ion-icon name="mail-outline"></ion-icon>

                <span>contact@asdrinfo.com</span>
              </a>
            </li>

          </ul>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="https://www.linkedin.com/company/asdr-infotech-pvt-ltd/mycompany/" target="_blank"
                class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-youtube"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <div class="footer-link-box">

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Company</p>
            </li>

            <li>
              <a href="about.php" class="footer-link">About</a>
            </li>

            <li>
              <a href="services.php" class="footer-link">Services</a>
            </li>

            <li>
              <a href="properties.php" class="footer-link">Properties</a>
            </li>



            <li>
              <a href="contact.php" class="footer-link">Contact Us</a>
            </li>

            <li>
              <a href="#" class="footer-link">Agency Login</a>
            </li>


          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Services</p>
            </li>

            <li>
              <a href="#" class="footer-link">Wish List</a>
            </li>

            <li>
              <a href="#" class="footer-link">Login</a>
            </li>

            <li>
              <a href="#" class="footer-link">My account</a>
            </li>

            <li>
              <a href="#" class="footer-link">Terms & Conditions</a>
            </li>

            <li>
              <a href="#" class="footer-link">Promotional Offers</a>
            </li>

          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Customer Care</p>
            </li>

            <li>
              <a href="#" class="footer-link">Login</a>
            </li>

            <li>
              <a href="#" class="footer-link">My account</a>
            </li>

            <li>
              <a href="#" class="footer-link">Wish List</a>
            </li>

            <li>
              <a href="#" class="footer-link">FAQ</a>
            </li>

            <li>
              <a href="contact.php" class="footer-link">Contact us</a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2023 <a href="https://asdrinfotech.com/" target="_blank">ASDR Infotech</a>. All Rights Reserved
        </p>

      </div>
    </div>

  </footer>

  <script>
    // Get the modal elements
    var loginModal = document.getElementById("login-modal");
    var registerModal = document.getElementById("register-modal");

    // Get the buttons that open the modals
    var loginBtn = document.querySelector("[data-modal='#login-modal']");
    var registerBtn = document.querySelector("[data-modal='#register-modal']");

    // Get the close buttons in the modals
    var closeBtns = document.getElementsByClassName("close");

    // Get the links to switch between login and registration forms
    var loginLink = document.getElementById("login-link");
    var registerLink = document.getElementById("register-link");

    // Get the create account button in the login modal
    var createAccountBtn = document.getElementById("create-account-btn");

    // When the user clicks the create account button, show the registration form modal
    createAccountBtn.onclick = function () {
      loginModal.style.display = "none";
      registerModal.style.display = "block";
    }

    // Get the login link in the registration form
    var loginLink = document.getElementById("login-link");

    // When the user clicks the login link, show the login form modal
    loginLink.onclick = function () {
      registerModal.style.display = "none";
      loginModal.style.display = "block";
    }

    // Get the close button in the login modal
    var loginCloseBtn = document.querySelector("#login-modal .modal-close-btn");

    // When the user clicks the close button, hide the login modal
    loginCloseBtn.onclick = function () {
      loginModal.style.display = "none";
    }

    // Get the close button in the registration form modal
    var registerCloseBtn = document.querySelector("#register-modal .modal-close-btn");

    // When the user clicks the close button, hide the registration form modal
    registerCloseBtn.onclick = function () {
      registerModal.style.display = "none";
    }



    // When the user clicks the login button, show the login modal
    loginBtn.onclick = function () {
      loginModal.style.display = "block";
    }



    // When the user clicks the registration button, show the registration modal
    registerBtn.onclick = function () {
      registerModal.style.display = "block";
    }

    // When the user clicks the close button in any modal, hide the modal
    for (var i = 0; i < closeBtns.length; i++) {
      closeBtns[i].onclick = function () {
        loginModal.style.display = "none";
        registerModal.style.display = "none";
      }
    }

    // When the user clicks anywhere outside of the modals, close the modals
    window.onclick = function (event) {
      if (event.target == loginModal) {
        loginModal.style.display = "none";
      }
      if (event.target == registerModal) {
        registerModal.style.display = "none";
      }
    }

    // When the user clicks the login link in the registration form, switch to the login form
    loginLink.onclick = function () {
      registerModal.style.display = "none";
      loginModal.style.display = "block";
    }

    // When the user clicks the register link in the login form, switch to the registration form
    registerLink.onclick = function () {
      loginModal.style.display = "none";
      registerModal.style.display = "block";
    }

    // When the user submits the login form, validate the inputs and log the user in
    document.getElementById("login-form").addEventListener("submit", function (event) {
      event.preventDefault();
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      // TODO: Add code to validate the inputs and log the user in
    });

    // When the user submits the registration form, validate the inputs and create a new account
    document.getElementById("register-form").addEventListener("submit", function (event) {
      event.preventDefault();
      var username = document.getElementById("reg-username").value;
      var password = document.getElementById("reg-password").value;
      var name = document.getElementById("name").value;
      // TODO: Add code to validate the inputs and create a new account
    });

  </script>

  <script>
    function closeAlert() {
      var alert = document.getElementById("alert");
      alert.style.display = "none";
    }
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var ShowLoginButtons = document.getElementsByClassName('ShowLogin');
      for (var i = 0; i < ShowLoginButtons.length; i++) {
        ShowLoginButtons[i].addEventListener('click', function (event) {
          event.preventDefault(); // Prevent page refresh
          alert('You are not logged in! Please log in to continue');
          // Additional login logic here
        });
      }
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var ShowLogin = document.getElementById('id1');
      ShowLogin.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent page refresh
        alert('You are not logged in! Please login to continue');
        // Additional login logic here
      });
    });
  </script>


  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>
  <script>
    const descriptionElement = document.getElementById('description');
    const words = descriptionElement.textContent.trim().split(' ');

    if (words.length > 25) {
      const truncatedText = words.slice(0, 25).join(' ');
      descriptionElement.textContent = truncatedText + '...';
    }

  </script>
  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>