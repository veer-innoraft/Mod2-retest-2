<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Stock Keeper</title>
</head>
<?php require('pages/header.php'); ?>
<body>
  <?php 
    if(!isset($_SESSION['loggedIn'])) {
      header('Location:pages/dashboard.php');
    } 
    else {
      header('Location:pages/dashboard.php');
    }
    ?>
</body>
</html>
