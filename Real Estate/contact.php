<?php
include '_dbconnect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Real Estate | Contact Us</title>

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
  <link href="/path/to/tailwind.css" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

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
                <a href="index.php" class="navbar-link active" data-nav-link>Home</a>
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
                <a href="contact.php" class="navbar-link" data-nav-link style="color: var(--orange-soda);">Contact</a>
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
          <p style="display: flex; align-items: center; justify-content: center;"><a href="#" id="create-account-btn"
              class="" style="color: var(--orange-soda); margin-left: 5px;">Don't Have
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
          <p style="display: flex; align-items: center; justify-content: center;"><a href="#" id="login-link" class=""
              style="color: var(--orange-soda); margin-left: 5px;">Already Have an Account</a>
          </p>
        </div>


      </form>


    </div>
  </div>



  <section class="text-gray-600 body-font relative">
    <div class="absolute inset-0 bg-gray-300">
      <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3801.2211826394937!2d74.17431001385418!3d17.68700849875212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2353edb39b219%3A0xd94b89972e1d994!2sMATOSHRI%20NIVAS!5e0!3m2!1sen!2sin!4v1656858193502!5m2!1sen!2sin"
        style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
    </div>
    <form action="contact.php" method="POST">
      <div class="container px-5 py-24 mx-auto flex">
        <div
          class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contactno = $_POST['contactno'];
            $message = $_POST['message'];

            include '_dbconnect.php';

            $insertData = "INSERT INTO `contact` (`name`, `email`, `contact_no`, `message`) VALUES ('$name', '$email', '$contactno', '$message')";
            $result = mysqli_query($conn, $insertData);


            if ($result) {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: rgb(209,231,221); border 1px solid rgb(183,217,202); color: rgb(20,108,67); border-radius: 5px; padding: 15px">
                            <strong>Thank You!</strong> Connecting With Real Estate Agency.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
            } else {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Something went wrong.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
            }
          }
          ?>
          <h1 class="text-gray-900 text-lg mb-1 font-medium title-font">Connect With Us</h1>
          <div class="relative mb-4 mt-3">
            <label for="email" class="leading-7 text-sm text-gray-600">Name</label>
            <input type="text" id="name" name="name"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
              required>
          </div>
          <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input type="email" id="email" name="email"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
              required>
          </div>
          <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">Contact Number</label>
            <input type="number" id="contactno" name="contactno"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          <div class="relative mb-4">
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea id="message" name="message"
              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
              required></textarea>
          </div>
          <button
            class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Get
            in Touch</button> <!--onclick="sendEmail()" -->
        </div>
      </div>
    </form>
  </section>

  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
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
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>