<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");

    exit;
}
?>
<?php
include '../_dbconnect.php';
?>
<?php
$userName = $_SESSION['name'];
$userId = $_SESSION['userid'];
?>

<?php
$userid = $_GET['userid'];
$userId = $_GET['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../_dbconnect.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate | Manage Properties</title>
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
    .alert-success {
        position: fixed;
        top: 100px;
        right: 10px;
        width: 250px;
        z-index: 9999;
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
        top: 86px;
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

    .headingsInModal {
        align-self: flex-start;
        margin-left: 2.3rem;
        margin-bottom: 5px;
        margin-top: 7px
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

        .headingsInModal {
            margin-left: 0px;
            /* text-align: left; */
        }
    }

    div::-webkit-scrollbar {
        display: none;
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
        <div class="header-bottom">
            <div class="container">

                <a href="#" class="logo">
                    <img src="../assets/images/cLogo.png" width="70px" height="50px" alt="Homeverse logo">
                </a>

                <nav class="navbar" data-navbar>

                    <div class="navbar-top">

                        <a href="#" class="logo">
                            <img src="../assets/images/cLogo.png" width="70px" height="50px" alt="Homeverse logo">

                        </a>

                        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
                            <ion-icon name="close-outline"></ion-icon>
                        </button>

                    </div>

                    <div class="navbar-bottom">
                        <ul class="navbar-list">

                            <li>
                                <a href="../afterUsersLogin/indexLoginUser.php" class="navbar-link"
                                    data-nav-link>Home</a>
                            </li>

                            <li>
                                <a href="../afterUsersLogin/about.php" class="navbar-link active"
                                    data-nav-link>About</a>
                            </li>

                            <li>
                                <a href="../afterUsersLogin/services.php" class="navbar-link" data-nav-link>Service</a>
                            </li>

                            <li>
                                <a href="../afterUsersLogin/properties.php" class="navbar-link"
                                    data-nav-link>Property</a>
                            </li>

                            <li>
                                <a href="../afterUsersLogin/contact.php" class="navbar-link" data-nav-link>Contact</a>
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

    <main>
        <article>
            <section class="property" id="property">
                <div class="container">
                    <?php
                    if (isset($_GET['message'])) {
                        $message = $_GET['message'];

                        // display the alert message
                        echo '<div class="alert alert-success alert-dismissible fade show mt-3" id="alert" role="alert">
                        <button type="button" class="close" onclick="closeAlert()" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Success!</strong> Property Deleted Successfully.
                      </div>';
                    }
                    ?>

                    <ul class="property-list has-scrollbar">

                        <?php
                        $sqlForProperties = "select * from property where userid = '$userid'";
                        $querySqlForProperties = mysqli_query($conn, $sqlForProperties);
                        $howMany = mysqli_num_rows($querySqlForProperties);
                        if ($howMany >= 1) {
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
    
                        
    
                       
    
                      </div>
    
                      <div class="card-footer-actions">
                        <a href="deleteProperty.php?srno=' . $srno . '&userid=' . $userid . '"><button class="card-footer-actions-btn">
                            <ion-icon name="trash-outline"></ion-icon>
                        </button></a>

    
                      </div>
    
                    </div>
    
                  </div>
                </li>
                ';
                            }
                        } else {
                            echo '
                        <center><h2 class="h2 section-title">No any property to show</h2></center>
                        ';
                        }

                        ?>
                    </ul>

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
                    &copy; 2023 <a href="https://asdrinfotech.com/" target="_blank">ASDR Infotech</a>. All Rights
                    Reserved
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
        const descriptionElement = document.getElementById('description');
        const words = descriptionElement.textContent.trim().split(' ');

        if (words.length > 25) {
            const truncatedText = words.slice(0, 25).join(' ');
            descriptionElement.textContent = truncatedText + '...';
        }

    </script>
    <script>
        function closeAlert() {
            var alert = document.getElementById("alert");
            alert.style.display = "none";
        }
    </script>
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