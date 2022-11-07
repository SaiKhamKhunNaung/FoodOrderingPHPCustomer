<?php
session_start();
session_destroy();
echo "<script>window.alert('Log Out Success')</script>";
echo "<script>window.location='customer_login.php'</script>";
?>