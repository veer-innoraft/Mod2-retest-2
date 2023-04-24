
<head>
  <link rel="stylesheet" href="../Public/stylesheets/style.css">
  <title>Dashboard</title>
</head>
<?php
  // Use App\Model\Classes\DbHelper;
  use App\Classes\DbHelper;
  require("../vendor/autoload.php");

  if (!isset($_SESSION)) {
      session_start();
    }

  // If not loggedIn then redirect to login page.
  if (!isset($_SESSION['loggedIn'])) {
    header('Location:http://local-csb.com/pages/dashboard.php');
  }
  
  // If user is loggedIn show stocks.
  else {
    require('../pages/header.php');
    $db = new DbHelper;
  ?>
  <form class="form-div" method='POST'>
    <span>
      <label for="name">NAME</label>
      <input id='name' name='name' type="text">
    </span>
    <span>
      <label for="runs">Runs Scored</label>
      <input id='runs' name='runs' type="text">
    </span>
    <span>
      <label for="balls">Balls Faced</label>
      <input id='balls' name='balls' type="text">
    </span>
    <span>
      <input class="addScoreButton" id="addScore-<?php echo $_SESSION['userId']?>" type="submit" value="SUBMIT">
    </span>
  </form>
<?php
  }
?>
<script src="../Public/scripts/home.js"></script>
