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
$srno = $_GET['srno'];
$userid = $_GET['userid'];
?>
<?php
$showError = false;
$sqlForDeleteProperty = "DELETE FROM `property` WHERE `property`.`srno` = $srno";
$querySqlForDeleteProperty = mysqli_query($conn, $sqlForDeleteProperty);

if ($querySqlForDeleteProperty) {
    $deleted = true;
    header("location: ./logedinUsersProperty.php?message=Invalid%20Credentials&userid=$userid");
}
?>