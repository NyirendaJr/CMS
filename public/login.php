<?php include_once('../includes/init.php') ?>
<?php
  if ($session->is_logged_in()) {
    redirect_to("home.php");
  }

  if (isset($_POST['submit'])) { // Form has been submitted.

      $regNo    = trim($_POST['regNo']);
      $password =   encrypt(trim($_POST['password']));


    // Check database to see if username/password exist.
	 //$user = new User();
	 //$found_user = $user->authenticate($regNo, $password);
  	$found_user = User::authenticate($regNo, $password);

    if ($found_user) {
      $session->login($found_user);
  		//log_action('Login', "{$found_user->username} logged in.");
      redirect_to("home.php");
    } else {
      // username/password combo was not found in the database
      $message = "incorrect Username or password .";
    }

  } else { // Form has not been submitted.
    $regNo = "";
    $password = "";
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Kilombero Sugar</title>
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- header -->
  <?php include_layout_template('header') ?>

  <!-- main content -->
  <div class="main_content_home">
    <div class="home_sidebar_container">
      <div class="home_sidebar">
        <!-- sidebar -->
      </div>
    </div>
    <div class="content_section">
      <div class="login_section">
        <h2>Login</h2>
        <?php if (isset($message)) {echo $message;} ?>
        <form action="login.php" method="post">

          <!-- reg number -->
          <label for="regNo">Reg Number</label>
          <input type="text" name="regNo" required>

          <!-- password -->
          <label for="password">Password</label>
          <input type="password" name="password" required>

          <!-- login btn -->
          <input type="submit" value="Login" name="submit">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
