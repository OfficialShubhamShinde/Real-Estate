<?php
$showError = false;
include '_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    $sql = "Select * from users where email = '$loginEmail' AND pass = '$loginPassword'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if ($num == 1) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['name'] = $row['name'];

        // $_SESSION['email'] = $loginEmail;
        header("location: ./afterUsersLogin/indexLoginUser.php");

    } else {
        $showAlert = true;
        header("location: index.php?message=Invalid%20Credentials");

    }

}
?>