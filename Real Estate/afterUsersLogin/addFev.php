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

<?php
$srno = $_GET['srno'];
$selectallfromid = "select * from property where srno = $srno";
$queryforallid = mysqli_query($conn, $selectallfromid);
$row = mysqli_fetch_assoc($queryforallid);
// $pid = $row['pid'];
$sellername = $row['sellername'];
$city = $row['city'];
$ptype = $row['ptype'];
$pname = $row['pname'];
$plocation = $row['plocation'];
$sqft = $row['sqft'];
$bhk = $row['bhk'];
$age = $row['age'];
$furnishing = $row['furnishing'];
$floor = $row['floor'];
$tfloor = $row['tfloor'];
$pdescribe = $row['pdescribe'];
$prise = $row['prise'];

$selectFev = "SELECT * FROM fev WHERE srno = $srno AND userid = $userId";
$querySelectFev = mysqli_query($conn, $selectFev);
$numRow = mysqli_num_rows($querySelectFev);


if ($numRow == 0) {
    $insert = "INSERT INTO `fev` (`srno`, `userid`, `sellername`, `city`, `ptype`, `pname`, `plocation`, `sqft`, `bhk`, `age`, `furnishing`, `floor`, `tfloor`, `pdescribe`, `prise`) VALUES ('$srno', '$userId', '$sellername', '$city', '$ptype', '$pname', '$plocation', '$sqft', '$bhk', '$age', '$furnishing', '$floor', '$tfloor', '$pdescribe', '$prise')";
    $queryInsert = mysqli_query($conn, $insert);
    if ($queryInsert) {
        echo "<script>alert('Property added successfully!');</script>";
        echo "<script>window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
        exit;
    }
} else {
    echo "<script>alert('Sorry! Property already added');</script>";
    echo "<script>window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
    exit;
}
?>