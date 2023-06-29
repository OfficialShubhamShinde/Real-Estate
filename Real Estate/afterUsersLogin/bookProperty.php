<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");

    exit;
}
?>
<?php
$srno = $_GET['srno'];
?>

<?php
include '../_dbconnect.php';
?>

<?php
$userName = $_SESSION['name'];
$userId = $_SESSION['userid'];
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cno = $_POST['cno'];
    $address = $_POST['address'];

    $insertData = "INSERT INTO `appoinments` (`pid`, `name`, `cno`, `email`, `address`) VALUES ('$srno', '$name', '$cno', '$email', '$address')";
    $result = mysqli_query($conn, $insertData);


    if ($result) {
        echo '
        <script>
        alert("Success")
        </script>
        ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate | Property Detail</title>

    <!-- 
    - favicon
  -->
    <!-- <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml"> -->

    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- 
    - google font link
  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

    <?php
    $selectDetalil = "select * from property where srno = '$srno'";
    $querySelectDetalil = mysqli_query($conn, $selectDetalil);
    while ($fatchProperty = mysqli_fetch_assoc($querySelectDetalil)) {
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
          <div class="bg-white">
          <div class="pt-6">
              <!-- Image gallery -->
              <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                  <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
                      <img src="../assets/images/res1.jpg" alt="Two each of gray, white, and black shirts laying flat."
                          class="h-full w-full object-cover object-center">
                  </div>
                  <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                      <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                          <img src="../assets/images/res2.jpg" alt="Model wearing plain black basic tee."
                              class="h-full w-full object-cover object-center">
                      </div>
                      <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                          <img src="../assets/images/res3.jpg" alt="Model wearing plain gray basic tee."
                              class="h-full w-full object-cover object-center">
                      </div>
                  </div>
                  <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                      <img src="../assets/images/res4.jpg" alt="Model wearing plain white basic tee."
                          class="h-full w-full object-cover object-center">
                  </div>
              </div>
  
              <!-- Product info -->
              <div
                  class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                  <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                      <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">' . $pname . '</h1>
                  </div>
  
                  <!-- Options -->
                  <div class="mt-4 lg:row-span-3 lg:mt-0">
                      <h2 class="sr-only">Product information</h2>
                      <p class="text-3xl tracking-tight text-gray-900">₹ ' . $price . '</p>';
    }
    ?>
    <!-- Reviews -->
    <div class="mt-6">
        <h3 class="sr-only">Reviews</h3>
        <div class="flex items-center">
            <div class="flex items-center">
                <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd" />
                </svg>

                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd" />
                </svg>

                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd" />
                </svg>

                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd" />
                </svg>

                <svg class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <p class="sr-only">4 out of 5 stars</p>
            <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500"></a>
            <div class="about-item-icon mx-3">
                <ion-icon name="heart-outline"></ion-icon>
            </div>
        </div>
    </div>
    <form action="" method="POST">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

            </div>

            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Book Appoinment</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600"></p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Full name</label>
                        <div class="mt-2">
                            <input id="email" name="name" type="name" autocomplete="email"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Contact No</label>
                        <div class="mt-2">
                            <input id="email" name="cno" type="text" autocomplete="email"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                            address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                        <div class="mt-2">
                            <textarea id="about" name="address" rows="3"
                                class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" id='ShowLogin'
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Book
                Appoinment
                Now</button>
        </div>
    </form>

    </div>

    <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
        <!-- Description and details -->
        <div>
            <h3 class="sr-only">Description</h3>

            <div class="space-y-6">
                <p class="text-base text-gray-900"> This property is a spacious one-story house located in a quiet
                    suburban neighborhood. The house features a large open floor plan with ample natural light flowing
                    through its expansive windows. The living area is cozy and inviting, complemented by a charming
                    fireplace. The kitchen is modern and well-equipped, perfect for culinary enthusiasts. The property
                    boasts three comfortable bedrooms, each with its own en-suite bathroom, offering privacy and
                    convenience. The backyard offers a generous outdoor space with a well-maintained garden and a patio
                    area, ideal for relaxing or entertaining guests. Overall, this property provides a comfortable and
                    welcoming atmosphere for a family or individuals seeking a peaceful retreat.
                </p>
            </div>
            <div class="mt-10">
                <h2 class="mb-5"><b>Highlights</b></h2>

                <ul>
                    <li style="list-style-type: circle; font-size: 16px; margin-left:100px">Emphasize the ample space
                        and open floor plan of the house, which allows for comfortable living and easy movement between
                        rooms.</li>
                    <li style="list-style-type: circle; font-size: 16px; margin-left:100px">Highlight the abundance of
                        natural light that fills the interior, creating a bright and airy atmosphere throughout the day.
                    </li>
                    <li style="list-style-type: circle; font-size: 16px; margin-left:100px">Describe the well-equipped
                        and modern kitchen, showcasing its features such as high-quality appliances, ample storage
                        space, and a functional layout.</li>
                    <li style="list-style-type: circle; font-size: 16px; margin-left:100px">Highlight the presence of
                        multiple bedrooms, each with its own en-suite bathroom, providing privacy and convenience for
                        residents or guests.</li>
                    <li style="list-style-type: circle; font-size: 16px; margin-left:100px">Emphasize the inviting and
                        cozy living area, enhanced by a charming fireplace, perfect for relaxing or hosting gatherings.
                    </li>
                </ul>
            </div>
            <!-- Sizes -->
            <div class="mt-10">
                <div class="flex items-center justify-between">
                    <h2 class="mb-5"><b>Location Advantages</b></h2>
                </div>

                <fieldset class="mt-4">
                    <legend class="sr-only">Choose a size</legend>
                    <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                        <label
                            class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                            <input type="radio" name="size-choice" value="L" class="sr-only"
                                aria-labelledby="size-choice-4-label">
                            <span id="size-choice-4-label">Near Station <br> <br>
                                <center><i style="font-size: 20px;" class="fas fa-map-marker-alt location-icon"></i>
                                </center>
                            </span>
                            <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                            <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                        </label>
                        <!-- Active: "ring-2 ring-indigo-500" -->
                        <label
                            class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                            <input type="radio" name="size-choice" value="XL" class="sr-only"
                                aria-labelledby="size-choice-5-label">
                            <span id="size-choice-5-label">Express Highway <br> <br>
                                <center> <i style="font-size: 20px;" class="fas fa-road"></i></center>
                            </span>

                            <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                            <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                        </label>
                        <!-- Active: "ring-2 ring-indigo-500" -->
                        <label
                            class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                            <input type="radio" name="size-choice" value="2XL" class="sr-only"
                                aria-labelledby="size-choice-6-label">
                            <span id="size-choice-6-label">Near Airport<br> <br>
                                <center> <i style="font-size: 20px;" class="fas fa-plane-departure"></i></center>
                            </span>

                            <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                            <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                        </label>
                        <!-- Active: "ring-2 ring-indigo-500" -->
                        <label
                            class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                            <input type="radio" name="size-choice" value="3XL" class="sr-only"
                                aria-labelledby="size-choice-7-label">
                            <span id="size-choice-7-label">Metro Station<br> <br>
                                <center><i style="font-size: 20px;" class="fas fa-train"></i></center>
                            </span>

                            <!--
                    Active: "border", Not Active: "border-2"
                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                  -->
                            <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                        </label>
                    </div>
                </fieldset>
            </div>

            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>



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