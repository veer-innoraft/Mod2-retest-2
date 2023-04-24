<head>
  <link rel="stylesheet" href="../Public/stylesheets/style.css">
</head>
<?php
use App\Classes\DbHelper;

session_start();
require('../vendor/autoload.php');
$db = new DbHelper();

// print_r($db->getScores());
require('header.php');
?>

<div class="table">
  <?php
  foreach ($db->getScores() as $row) {
    ?>
    <div class="rows fd-row sp-bw ">
      <span class="row-item name">
        <?php echo $row['name']; ?>
      </span>
      <span class="row-item score">
        <?php echo $row['runs']; ?>
      </span>
      <span class="row-item ball">
        <?php echo $row['balls']; ?>
      </span>
      <span class="row-item strike_rate">
        <?php echo $row['strike_rate']; ?>
      </span>
      <?php
      if (isset($_SESSION['loggedIn']) && $_SESSION['userId'] == $row['user_id']) { ?>
        <button id="delete-<?php echo $row['id'] ?>" class="delete-btn">delete</button>
      <?php } ?>
    </div>


    <?php
  }
  ?>
</div>

<?php

if (!isset($_SESSION['loggedIn'])) { ?>
  <button class='btn' id='motm-btn'>MAN OF THE MATCH</button>
  <?php
}
?>
<script src="../Public/scripts/dashboard.js"></script>
