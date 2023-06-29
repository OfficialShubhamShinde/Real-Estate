<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");

  exit;
}
?>
<?php
$userName = $_SESSION['name'];
$userId = $_SESSION['userid'];
?>
<?php
include '../_dbconnect.php';
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
  <link rel="stylesheet" href="../assets/css/style.css">

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
  .dropdown {
    position: relative;
  }

  .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    display: none;
  }

  .dropdown:hover .dropdown-menu {
    display: block;
  }

  .dropdown-menu.show {
    display: block;
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
          <!-- Logo Here -->
          <img src="../assets/images/cLogo.png" width="70px" height="50px" alt="Homeverse logo">

          <!-- <img src="../assets/images/logo.png" alt="Homeverse logo"> -->
        </a>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <!-- Logo Here -->
              <img src="../assets/images/cLogo.png" width="70px" height="50px" alt="Homeverse logo">

              <!-- <img src="../assets/images/logo.png" alt="Homeverse logo"> -->
            </a>

            <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          <div class="navbar-bottom">
            <ul class="navbar-list">

              <li>
                <a href="../afterUsersLogin/indexLoginUser.php" class="navbar-link" data-nav-link>Home</a>
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
                <a href="../afterUsersLogin/contact.php" class="navbar-link" data-nav-link
                  style="color: var(--orange-soda);">Contact</a>
              </li>

            </ul>
          </div>

        </nav>
        <div class="header-bottom-actions">

          <!-- <button class="header-bottom-actions-btn" aria-label="Search">
                      <ion-icon name="search-outline"></ion-icon>
          
                      <span>Search</span>
                    </button> -->
          <div class="dropdown">
            <button class="header-bottom-actions-btn" aria-label="Profile">
              <ion-icon name="person-outline"></ion-icon>
              <span>Profile</span>
            </button>
            <ul class="dropdown-menu"
              style="background-color: white; max-width:160px; border-radius: 10px; margin-top: 2px;">
              <li>
                <a href="#"
                  style="display: flex; align-items: center; width: 100px; margin-top: 20px; color: black; margin-bottom: 20px; margin-left: 10px; margin-right: 10px">
                  <img src="../assets/icons/person-fill.svg" alt="Icon"
                    style="height: 20px; width: 20px; margin-right: 5px; ">Profile
                </a>
              </li>
              <li>
                <?php
                echo '
                          <a href="logedinUsersProperty.php?userid=' . $userId . '"
                            style="display: flex; align-items: center; width: 160px; margin-top: 20px; color: black; margin-bottom: 20px; margin-left: 10px; margin-right: 10px">
                            <img src="../assets/icons/house.svg" alt="Icon"
                              style="height: 20px; width: 20px; margin-right: 5px; ">My Properties
                          </a>
                          ';
                ?>

              </li>




            </ul>
          </div>



          <button class="header-bottom-actions-btn" id="fevButton" aria-label="Cart">
            <a href="showFev.php">
              <ion-icon name="heart-outline"></ion-icon>
              <span>Cart</span>
            </a>
          </button>

          <button class="header-bottom-actions-btn" aria-label="Logout" onclick="location.href='../_logout.php';">
            <ion-icon name="log-out-outline"></ion-icon>
            <span>Logout</span>
          </button>


          <button class="header-bottom-actions-btn" data-nav-open-btn aria-label="Open Menu">
            <ion-icon name="menu-outline"></ion-icon>

            <span>Menu</span>
          </button>

        </div>

      </div>
    </div>

  </header>

  <section class="text-gray-600 body-font relative">
    <div class="absolute inset-0 bg-gray-300">
      <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3801.2211826394937!2d74.17431001385418!3d17.68700849875212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2353edb39b219%3A0xd94b89972e1d994!2sMATOSHRI%20NIVAS!5e0!3m2!1sen!2sin!4v1656858193502!5m2!1sen!2sin"
        style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
    </div>
    <form action="" method="POST">
      <div class="container px-5 py-24 mx-auto flex">
        <div
          class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contactno = $_POST['contactno'];
            $message = $_POST['message'];

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
  <script src="../assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>