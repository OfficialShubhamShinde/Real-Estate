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

<!DOCTYPE html>
<html lang="en">
<?php
include '../_dbconnect.php';
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome!
    <?php echo $userName ?> | Real Estate Agency
  </title>

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

    .headingInModal {
      margin-left: 28px;
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
                <a href="../afterUsersLogin/indexLoginUser.php" class="navbar-link active" data-nav-link
                  style="color: var(--orange-soda);">Home</a>
              </li>

              <li>
                <a href="../afterUsersLogin/about.php" class="navbar-link" data-nav-link>About</a>
              </li>

              <li>
                <a href="../afterUsersLogin/services.php" class="navbar-link" data-nav-link>Service</a>
              </li>

              <li>
                <a href="../afterUsersLogin/properties.php" class="navbar-link" data-nav-link>Property</a>
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

              <button class="tab-btn" style="justify-content: center;" data-tab-btn
                data-modal="#login-modal"><b>Sell</b></button>

            </div>

            <!-- Login  -->
            <div id="login-modal" class="modal">
              <div class="modal-content" style="height: 420px; overflow-y: scroll; overflow-x: hidden;">
                <button type="button" class="modal-close-btn">&times;</button>
                <center>
                  <h2>Add Property</h2>
                </center> <br>
                <form action="" method="POST">
                  <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                    <img src="../assets/images/cLogo.png" alt="Your Logo" style="width: 100px; height: 80px;">
                  </div>
                  <div style="display: flex; flex-direction: column; align-items: center;">
                    <h4 class="headingsInModal">Property Type</h4>
                    <select id="city" name="city" autocomplete="country-name"
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                      <option value="Select">Select City</option>
                      <option value="Bangalore">Bangalore</option>
                      <option value="Pune">Pune</option>
                      <option value="Gurgaon">Gurgaon</option>
                      <option value="Delhi">Delhi</option>
                      <option value="Gaziabad">Gaziabad</option>
                      <option value="Noida">Noida</option>
                      <option value="Mumbai">Mumbai</option>
                      <option value="Chennai">Chennai</option>
                      <option value="Hyderabad">Hyderabad</option>
                      <option value="Faridabad">Faridabad</option>
                    </select>

                    <select id="ptype" name="ptype" autocomplete="ptype"
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                      <option value="Property Type">Property Type</option>
                      <option value="Residential">Residential</option>
                      <option value="Commercial">Commercial</option>
                      <option value="Land/Plot">Land/Plot</option>
                    </select>
                    <h4 class="headingsInModal">Property Details</h4>
                    <input type="text" id="name" name="pname" placeholder="Property Name" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <input type="text" id="location" name="location" placeholder="Property Location" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <input type="number" step="0.01" id="sqft" name="sqft" placeholder="sq.ft" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <select id="bhk" name="bhk" autocomplete="bhk"
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                      <option value="BHK Type">BHK Type</option>
                      <option value="1 BHK">1 BHK</option>
                      <option value="2 BHK">2 BHK</option>
                      <option value="3 BHK">3 BHK</option>
                      <option value="4 BHK">4 BHK</option>
                      <option value="5 BHK">5 BHK</option>
                    </select>

                    <select id="age" name="age" autocomplete="age"
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                      <option value="Age of Property">Age of Property</option>
                      <option value="Under Construction">Under Construction</option>
                      <option value="Less than a Year">Less than a Year</option>
                      <option value="1 to 5 Year">1 to 5 Year</option>
                      <option value="5 to 10 Year">5 to 10 Year</option>
                      <option value="More than 10 year">More than 10 year</option>
                    </select>

                    <select id="furnishing" name="furnishing" autocomplete="furnishing"
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                      <option value="Furnishing">Furnishing</option>
                      <option value="Fully Furnishing">Fully Furnishing</option>
                      <option value="Semi Furnishing">Semi Furnishing</option>
                      <option value="UnFurnishingt">UnFurnishingt</option>
                    </select>

                    <select id="floor" name="floor" autocomplete="floor"
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                      <option>Floor</option>
                      <option>Lower Basement</option>
                      <option>Upper Basement</option>
                      <option>Ground</option>
                      <option>Full Building</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                      <option>13</option>
                      <option>14</option>
                      <option>15</option>
                      <option>16</option>
                      <option>17</option>
                      <option>18</option>
                      <option>19</option>
                      <option>20</option>
                      <option>21</option>
                      <option>22</option>
                      <option>23</option>
                      <option>24</option>
                      <option>25</option>
                      <option>26</option>
                      <option>27</option>
                      <option>28</option>
                      <option>29</option>
                      <option>30</option>
                      <option>31</option>
                      <option>32</option>
                      <option>33</option>
                      <option>34</option>
                      <option>35</option>
                      <option>36</option>
                      <option>37</option>
                      <option>38</option>
                      <option>39</option>
                      <option>40</option>
                      <option>41</option>
                      <option>42</option>
                      <option>43</option>
                      <option>44</option>
                      <option>45</option>
                      <option>46</option>
                      <option>47</option>
                      <option>48</option>
                      <option>49</option>
                      <option>50</option>
                      <option>51</option>
                      <option>52</option>
                      <option>53</option>
                      <option>54</option>
                      <option>55</option>
                      <option>56</option>
                      <option>57</option>
                      <option>58</option>
                      <option>59</option>
                      <option>60</option>
                      <option>61</option>
                      <option>62</option>
                      <option>63</option>
                      <option>64</option>
                      <option>65</option>
                      <option>66</option>
                      <option>67</option>
                      <option>68</option>
                      <option>69</option>
                      <option>70</option>
                      <option>71</option>
                      <option>72</option>
                      <option>73</option>
                      <option>74</option>
                      <option>75</option>
                      <option>76</option>
                      <option>77</option>
                      <option>78</option>
                      <option>79</option>
                      <option>80</option>
                      <option>81</option>
                      <option>82</option>
                      <option>83</option>
                      <option>84</option>
                      <option>85</option>
                      <option>86</option>
                      <option>87</option>
                      <option>88</option>
                      <option>89</option>
                      <option>90</option>
                      <option>91</option>
                      <option>92</option>
                      <option>93</option>
                      <option>94</option>
                      <option>95</option>
                      <option>96</option>
                      <option>97</option>
                      <option>98</option>
                      <option>99</option>
                    </select>

                    <select id="tfloor" name="tfloor" autocomplete="tfloor"
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;"
                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                      <option>Total Floor</option>
                      <option>0</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                      <option>13</option>
                      <option>14</option>
                      <option>15</option>
                      <option>16</option>
                      <option>17</option>
                      <option>18</option>
                      <option>19</option>
                      <option>20</option>
                      <option>21</option>
                      <option>22</option>
                      <option>23</option>
                      <option>24</option>
                      <option>25</option>
                      <option>26</option>
                      <option>27</option>
                      <option>28</option>
                      <option>29</option>
                      <option>30</option>
                      <option>31</option>
                      <option>32</option>
                      <option>33</option>
                      <option>34</option>
                      <option>35</option>
                      <option>36</option>
                      <option>37</option>
                      <option>38</option>
                      <option>39</option>
                      <option>40</option>
                      <option>41</option>
                      <option>42</option>
                      <option>43</option>
                      <option>44</option>
                      <option>45</option>
                      <option>46</option>
                      <option>47</option>
                      <option>48</option>
                      <option>49</option>
                      <option>50</option>
                      <option>51</option>
                      <option>52</option>
                      <option>53</option>
                      <option>54</option>
                      <option>55</option>
                      <option>56</option>
                      <option>57</option>
                      <option>58</option>
                      <option>59</option>
                      <option>60</option>
                      <option>61</option>
                      <option>62</option>
                      <option>63</option>
                      <option>64</option>
                      <option>65</option>
                      <option>66</option>
                      <option>67</option>
                      <option>68</option>
                      <option>69</option>
                      <option>70</option>
                      <option>71</option>
                      <option>72</option>
                      <option>73</option>
                      <option>74</option>
                      <option>75</option>
                      <option>76</option>
                      <option>77</option>
                      <option>78</option>
                      <option>79</option>
                      <option>80</option>
                      <option>81</option>
                      <option>82</option>
                      <option>83</option>
                      <option>84</option>
                      <option>85</option>
                      <option>86</option>
                      <option>87</option>
                      <option>88</option>
                      <option>89</option>
                      <option>90</option>
                      <option>91</option>
                      <option>92</option>
                      <option>93</option>
                      <option>94</option>
                      <option>95</option>
                      <option>96</option>
                      <option>97</option>
                      <option>98</option>
                      <option>99</option>
                    </select>

                    <input type="text" id="describep" name="describep" placeholder="Something about property" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 30px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <h4 class="headingsInModal">Resale Details</h4>
                    <input type="number" id="price" name="price" placeholder="Expected Price" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <input type="date" id="available" name="available" placeholder="Available From" required
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <input type="file" id="img" name="img" placeholder="Property Image"
                      style="border-radius: 10px; border: 1px solid #ccc; padding: 10px; width: 100%; max-width: 400px; display: block; margin-bottom: 10px;">

                    <div style="text-align: center;">
                      <p style="display: flex; align-items: center; justify-content: center;"> <a href=""
                          style="color: var(--orange-soda); margin-left: 5px;"></a></p>
                    </div>
                    <br>
                    <input type="submit" value="Add" name="add"
                      style="border-radius: 10px; background-color: var(--orange-soda); color: white; padding: 15px; border: none; cursor: pointer; display: block;">
                    <br>
                  </div>

                  <div style="text-align: center;">
                    <p style="display: flex; align-items: center; justify-content: center;"><a href="#"
                        id="create-account-btn" class="" style="color: var(--orange-soda); margin-left: 5px;"></a></p>
                  </div>
                </form>
              </div>
            </div>

            <?php
            if (isset($_POST['add'])) {
              $city = $_POST['city'];
              $ptype = $_POST['ptype'];
              $pname = $_POST['pname'];
              $location = $_POST['location'];
              $sqft = $_POST['sqft'];
              $bhk = $_POST['bhk'];
              $age = $_POST['age'];
              $furnishing = $_POST['furnishing'];
              $floor = $_POST['floor'];
              $tfloor = $_POST['tfloor'];
              $describep = $_POST['describep'];
              $price = $_POST['price'];
              $available = $_POST['available'];
              $img = $_POST['img'];


              $insertData2 = "INSERT INTO `property` (`sellername`, `userid`, `city`, `ptype`, `pname`, `plocation`, `sqft`, `bhk`, `age`, `furnishing`, `floor`, `tfloor`, `pdescribe`, `prise`, `available`, `img`) VALUES ('$userName', '$userId', '$city', '$ptype', '$pname', '$location', '$sqft', '$bhk', '$age', '$furnishing', '$floor', '$tfloor', '$describep', '$price', '$available', '$img')";
              $result2 = mysqli_query($conn, $insertData2);
              if ($result2) {
                echo '<div class="alert alert-success alert-dismissible fade show mt-3" id="alert" role="alert">
                            <button type="button" class="close" onclick="closeAlert()" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Success!</strong> Property Added Sucessfully.
                          </div>';
              }
            }
            ?>


            <!-- Sign up  -->
            <div id="register-modal" class="modal">
              <div class="modal-content">
                <button type="button" class="modal-close-btn">&times;</button>
                <center>
                  <h2>Sign Up</h2>
                </center> <br>
                <form action="" method="POST">
                  <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                    <img src="../assets/images/cLogo.png" alt="Your Logo" style="width: 100px; height: 80px;">
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





            <form class="hero-form" action="search.php" method="get">
              <div class="input-wrapper">
                <label for="exampleInputEmail1" class="form-label"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                      d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                  </svg> Search location Here</label>
                <input type="search" name="search" class="form-control" id="searchBar" aria-describedby="search"
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

              <button type="submit" class="btn btn-primary">Search now</button>

            </form>
          </div>

        </div>
      </section>




      <!-- 
        - #ABOUT
      -->

      <section class="about" id="about">
        <div class="container">

          <figure class="about-banner">
            <img src="../assets/images/about-banner-1.png" alt="House interior">

            <img src="../assets/images/about-banner-2.jpg" alt="House interior" class="abs-img">
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
                  <img src="../assets/images/service-1.png" alt="Service icon">
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
                  <img src="../assets/images/service-2.png" alt="Service icon">
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
                  <img src="../assets/images/service-3.png" alt="Service icon">
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

          <p class="section-subtitle">Properties</p>

          <h2 class="h2 section-title">Featured Listings</h2>

          <ul class="property-list has-scrollbar">

            <?php
            $sqlForProperties = "SELECT * FROM property ORDER BY srno DESC LIMIT 7";
            $querySqlForProperties = mysqli_query($conn, $sqlForProperties);


            while ($fatchProperty = mysqli_fetch_assoc($querySqlForProperties)) {
              $city = $fatchProperty['city'];
              $srno = $fatchProperty['srno'];
              $ptype = $fatchProperty['ptype'];
              $sellername = $fatchProperty['sellername'];
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
          &copy; 2023 <a href="https://asdrinfotech.com/" target="_blank">ASDR Infotech</a>. All Rights Reserved
        </p>

      </div>
    </div>

  </footer>
  <script>
    const descriptionElement = document.getElementById('description');
    const words = descriptionElement.textContent.trim().split(' ');

    if (words.length > 25) {
      const truncatedText = words.slice(0, 25).join(' ');
      descriptionElement.textContent = truncatedText + '...';
    }

  </script>
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
  <!-- 
    - custom js link
  -->
  <script src="../assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script>
    const dropdownButton = document.querySelector('.header-bottom-actions-btn');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownButton.addEventListener('click', () => {
      dropdownMenu.classList.toggle('show');
    });

  </script>


</body>

</html>