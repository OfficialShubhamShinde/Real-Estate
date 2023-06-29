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
?>

<?php
$userid = $_GET['userid'];
$srno = $_GET['srno'];

$delet = "DELETE FROM fev WHERE srno = $srno AND userid = $userid";
$deleteQuery = mysqli_query($conn, $delet);
if ($deleteQuery) {
    echo "<script>alert('Property deleted successfully!'); window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
}
?>