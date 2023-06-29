<?php
echo '<script>alert("You are not loggin! Please login to continue")</script>';
echo '<script>window.location.href = "' . $_SERVER["HTTP_REFERER"] . '"</script>';
?>