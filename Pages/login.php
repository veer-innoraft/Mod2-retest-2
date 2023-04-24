<?php
use App\Classes\DbCRUD;
use App\Classes\Login;

// Adding login services 
require('../vendor/autoload.php');
require('header.php');

// If already loggedIn then redirect to homepage
if (isset($_SESSION['loggedIn']) || (isset($isLoggedIn) && $isLoggedIn))
  Header("Location:http://local-stockkeeper.com");

// If form submitted then create a Login object and validate user.
if(isset($_POST)) {
  $loginObject = new Login($_POST);
  $isLoggedIn = $loginObject->loginUser();
  if($isLoggedIn) {
    Header("Location:http://local-csb.com/pages/home.php");
  }

}
?>

<head>
  <link rel="stylesheet" href="../public/stylesheets/style.css">
</head>

<body>
  <form class="form-div " method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h2>Login Page</h2>
    <span class="error-div" name="loginerr"><?php if(isset($loginObject->message)) echo $loginObject->message['text'] ; ?></span>
    <span>
      Username: <span class="error" name="usererr"></span>
      <input type="text" name="userId" placeholder=" Username / Email" value='<?php if (isset($_POST["userId"]))
        echo $_POST["userId"]; ?>'>
    </span>
    <span>
      Password:<span class="error" name="passerr"></span>
      <input type="password" name="pass" id="pass" placeholder="Enter Password" value='<?php if (isset($_POST["pass"]))
        echo $_POST["pass"] ?>'>
        <i class="bi bi-eye-slash " id="togglePassword">
        </i>
    </span>
      <?php
      if (isset($forgotPass) && $forgotPass) { ?>
      <a class="link-btn " href="forgotPass.php">forgotten password?</a>
    <?php } ?>
    <div class="sp-bw">
      <input class="hover-eff click-eff btn " type="submit" name="submit" id="login-btn" value="Login">
      <a class="link-btn grow " href="http://local-csb/pages/register.php">I\'m new</a>
    </div>
  </form>
</body>


