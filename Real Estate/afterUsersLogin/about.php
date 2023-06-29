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
  <title>Real Estate | About Us</title>

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

</head>

<style>
  .row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -15px;
  }

  .col-lg-4 {
    flex: 0 0 33.333333%;
    max-width: 33.333333%;
    padding: 0 15px;
  }

  .rounded-circle {
    border-radius: 50%;
    width: 140px;
    height: 140px;
  }

  h2 {
    font-weight: 500;
    font-size: 1.5rem;
    margin-top: 1rem;
    margin-bottom: 0.5rem;
  }

  p {
    margin-top: 0;
    margin-bottom: 1rem;
  }

  .about-section {
    max-width: 1400px;
    margin: 0 auto;
    padding: 50px 20px;
    text-align: center;
    font-family: sans-serif;
    background-color: #f5f5f5;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }

  .about-section h2 {
    font-size: 36px;
    margin-bottom: 30px;
  }

  .about-section p {
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 20px;
  }

  .about-section a {
    color: #007bff;
    text-decoration: none;
  }

  .about-section a:hover {
    text-decoration: underline;
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
                <a href="indexLoginUser.php" class="navbar-link" data-nav-link>Home</a>
              </li>

              <li>
                <a href="about.php" class="navbar-link" data-nav-link style="color: var(--orange-soda);">About</a>
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

  <section class="service" id="service" style="padding-block: 30px">
    <div class="container">

      <p class="section-subtitle">About Us</p>

      <h2 class="h2 section-title">About Us</h2>
      <section class="about-section">
        <p>Welcome to Real Estate! We are a team of experienced and dedicated real estate professionals who are
          committed to helping our clients achieve their home buying and selling goals.</p>
        <p>With our X years of combined experience in the real estate industry, we have developed a deep understanding
          of the local market dynamics, trends, and neighborhoods. This expertise allows us to provide insightful
          guidance to our clients, helping them make informed decisions and navigate the ever-changing real estate
          landscape.</p>
        <p>At Real Estate, we prioritize personalized service above all else. We recognize that each client has unique
          needs and preferences, and we tailor our approach to meet those requirements. Whether you're a first-time
          homebuyer, a seasoned investor, or looking to sell your property, we will work closely with you to understand
          your objectives and create a customized strategy to achieve success.</p>
        <p>Our mission is to ensure that the home buying and selling process is seamless and stress-free for our
          clients. We handle every aspect of the transaction with utmost professionalism and attention to detail, from
          market research and property valuation to negotiations and closing. Throughout the journey, we maintain open
          lines of communication, keeping you informed and empowered to make confident decisions.</p>
        <p>At Real Estate, we value the trust our clients place in us, and we are dedicated to exceeding their
          expectations. We measure our success not only by the successful transactions we facilitate but also by the
          satisfaction and happiness of our clients. Join us, and let us guide you towards achieving your real estate
          dreams.</p>
      </section>
      <h2 class="h2 section-title">Our Clients</h2>



      <div class="row">
        <div class="col-lg-4">
          <center>
            <img src="../assets/images/clientImg.png" alt="Placeholder" class="rounded-circle">
            <h2 class="fw-normal">Sonam Kapur</h2>
            <p>Top real estate clients are discerning individuals who demand high-quality properties and exceptional
              service, often seeking luxury homes in prime locations with impressive amenities.</p>
          </center>
        </div>
        <div class="col-lg-4">
          <center>
            <img src="../assets/images/clientImg.png" alt="Placeholder" class="rounded-circle">
            <h2 class="fw-normal">Jon Sigh</h2>
            <p>These clients are known for their astute investment decisions, extensive portfolios, and a keen eye for
              opportunities in the real estate market, making them sought-after partners for developers and agents
              alike.</p>
          </center>
        </div>
        <div class="col-lg-4">
          <center>
            <img src="../assets/images/clientImg.png" alt="Placeholder" class="rounded-circle">
            <h2 class="fw-normal">Balram Rathod</h2>
            <p>Top real estate clients prioritize personalized experiences, relying on trusted advisors to understand
              their unique preferences and deliver tailored solutions that align with their lifestyle and investment
              goals.</p>
          </center>
        </div>
      </div>
    </div>
  </section>
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