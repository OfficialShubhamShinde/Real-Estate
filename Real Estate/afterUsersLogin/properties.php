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
  <title>Real Estate | Properties</title>

  <!-- 
    - favicon
  -->
  <!-- <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml"> -->

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- <link rel="stylesheet" href="../assets/css/styleBootstrap.css"> -->

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
  .navbar-link {
    text-decoration: none;
  }

  .footer-link {
    text-decoration: none;
  }

  .card-img-top {
    height: 250px;
  }

  .card-title a {
    text-decoration: none;
  }

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
    <div class="header-bottom ">
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
                <a href="indexLoginUser.php" class="navbar-link" data-nav-link>Home</a>
              </li>

              <li>
                <a href="about.php" class="navbar-link" data-nav-link>About</a>
              </li>

              <li>
                <a href="services.php" class="navbar-link" data-nav-link>Service</a>
              </li>

              <li>
                <a href="properties.php" class="navbar-link" data-nav-link
                  style="color: var(--orange-soda);">Property</a>
              </li>

              <li>
                <a href="contact.php" class="navbar-link" data-nav-link>Contact</a>
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
  <div class="cards" style="background-color: rgb(241,245,247);">
    <br>

    <div class="container">
      <p class="section-subtitle">Residential</p>
      <!-- <h3>Villa</h3> -->
      <ul class="property-list has-scrollbar">
        <?php
        $sqlForProperties = "SELECT * FROM property where ptype = 'Residential'";
        $querySqlForProperties = mysqli_query($conn, $sqlForProperties);


        while ($fatchProperty = mysqli_fetch_assoc($querySqlForProperties)) {
          $srno = $fatchProperty['srno'];
          $city = $fatchProperty['city'];
          $sellername = $fatchProperty['sellername'];
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
          echo '
            <li>
              <div class="property-card">

                <figure class="card-banner">

                  <a href="#">
                    <img src="../assets/images/property-1.jpg" alt="New Apartment Nice View" class="w-100">
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

                  <p class="card-text">
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
                      <img src="../assets/images/user1.png" alt="William Seklo" class="w-100">
                    </figure>

                    <div>
                      <p class="author-name">
                      <a href="#">' . $sellername . '</a>
                      </p>

                      <p class="author-title">Estate Agents</p>
                    </div>

                  </div>

                  <div class="card-footer-actions">

                    <button class="card-footer-actions-btn">
                      <ion-icon name="resize-outline"></ion-icon>
                    </button>

                    <a href="addFev.php?srno=' . $srno . '">
                    <button class="card-footer-actions-btn">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    </a>

                    <button class="card-footer-actions-btn">
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
      <br>
      <!-- <h3>Offices</h3> -->
      <p class="section-subtitle">Commercial</p>
      <ul class="property-list has-scrollbar">
        <?php
        $sqlForResidentialProperty = "SELECT * FROM property where ptype = 'Commercial'";
        $querySqlForResidentialProperty = mysqli_query($conn, $sqlForResidentialProperty);


        while ($fatchProperty = mysqli_fetch_assoc($querySqlForResidentialProperty)) {
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
          echo '
            <li>
              <div class="property-card">

                <figure class="card-banner">

                  <a href="#">
                    <img src="../assets/images/property-1.jpg" alt="New Apartment Nice View" class="w-100">
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
                    <a href="bookProperty.php">' . $pname . '</a>
                  </h3>

                  <p class="card-text">
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
                      <img src="../assets/images/user1.png" alt="William Seklo" class="w-100">
                    </figure>

                    <div>
                      <p class="author-name">
                        <a href="#">William Seklo</a>
                      </p>

                      <p class="author-title">Estate Agents</p>
                    </div>

                  </div>

                  <div class="card-footer-actions">

                    <button class="card-footer-actions-btn">
                      <ion-icon name="resize-outline"></ion-icon>
                    </button>

                    <a href="addFev.php?srno=' . $srno . '">
                    <button class="card-footer-actions-btn">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    </a>

                    <button class="card-footer-actions-btn">
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
      <br>
      <p class="section-subtitle">Land/Plot</p>
      <!-- <h3>House</h3> -->
      <ul class="property-list has-scrollbar">
        <?php
        $sqlForProperties = "SELECT * FROM property where ptype = 'Land/Plot'";
        $querySqlForProperties = mysqli_query($conn, $sqlForProperties);


        while ($fatchProperty = mysqli_fetch_assoc($querySqlForProperties)) {
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
          echo '
            <li>
              <div class="property-card">

                <figure class="card-banner">

                  <a href="#">
                    <img src="../assets/images/property-1.jpg" alt="New Apartment Nice View" class="w-100">
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
                    <a href="bookProperty.php">' . $pname . '</a>
                  </h3>

                  <p class="card-text">
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
                      <img src="../assets/images/user1.png" alt="William Seklo" class="w-100">
                    </figure>

                    <div>
                      <p class="author-name">
                        <a href="#">William Seklo</a>
                      </p>

                      <p class="author-title">Estate Agents</p>
                    </div>

                  </div>

                  <div class="card-footer-actions">

                    <button class="card-footer-actions-btn">
                      <ion-icon name="resize-outline"></ion-icon>
                    </button>

                    <a href="addFev.php?srno=' . $srno . '">
                    <button class="card-footer-actions-btn">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>
                    </a>

                    <button class="card-footer-actions-btn">
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
      <br>
    </div>
  </div>
  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <!-- <img src="../assets/images/logo-light.png" alt="Homeverse logo"> -->
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