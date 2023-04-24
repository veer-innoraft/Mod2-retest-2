<?php
session_start();

require("../vendor/autoload.php");
if (isset($_SESSION['loggedIn'])) { 
  unset($_SESSION['userId']);
  unset($_SESSION['loggedIn']);
  session_destroy();
  echo 'Successfully LoggedOut';
  ?>
  <p><a href="http://local-csb.com">GOTO Login page</a></p>
  <?php
}
else {
  echo 'Already disconnected';
    ?>
  <a href="http://local-csb.com/"> Goto Dashboard </a>
<?php
}
?>