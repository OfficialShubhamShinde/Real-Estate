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
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

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
                    <button class="header-bottom-actions-btn" aria-label="Logout"
                        onclick="location.href='../_logout.php';">
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
            <div class="product-box">
                <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                    <div class="flex items-start justify-between">
                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                            fevourte</h2>

                    </div>

                    <div class="mt-8">
                        <div class="flow-root">
                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                                <?php
                                $selectFev = "SELECT * FROM fev WHERE userid = $userId";
                                $querySelectFev = mysqli_query($conn, $selectFev);
                                while ($row = mysqli_fetch_assoc($querySelectFev)) {
                                    $srno = $row['srno'];
                                    $pname = $row['pname'];
                                    $city = $row['city'];
                                    $price = $row['prise'];

                                    echo '
                                <li class="flex py-6">
                                <div
                                    class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="../assets/images/property-1.jpg"
                                        alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                        class="h-full w-full object-cover object-center">
                                </div>

                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>
                                                <a href="bookProperty.php?srno=' . $srno . '">' . $pname . '</a>
                                            </h3>
                                            <p class="ml-4">₹' . $price . '</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">' . $city . '</p>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                        <p class="text-gray-500"></p>

                                        <a href="deleteFev.php?srno=' . $srno . '&userid=' . $userId . '">
                                        <div class="flex">
                                            <img src="../assets/images/trash.svg" width="20px"
                                                height="20px" alt="">
                                        </div>
                                        </a>
                                        
                                    </div>
                                </div>
                            </li>
                                ';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
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
                    &copy; 2023 <a href="https://asdrinfotech.com/" target="_blank">ASDR Infotech</a>. All Rights
                    Reserved
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