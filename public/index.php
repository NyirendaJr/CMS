<?php require_once('../includes/init.php') ?>
<?php if($session->is_logged_in()){redirect_to("home.php");} ?>
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
  <div class="wrapper">
   <?php include_layout_template('header') ?>
    <div class="desc_system">
      <h3>Farmers System</h3>
      <a href="login.php">Login</a>
    </div>
    </div>


  <!--Main container -->
    <div class="contact_and_about">
      <div class="about_us">
        <h3>About Us</h3>
        <p>
          Lorem Ipsum is simply dummy text of the printing and
          typesetting industry. Lorem Ipsum has been
          the industry's standard dummy text ever since the
          1500s, when an unknown printer took a galley of type and
          scrambled it to make a type specimen book. It has survived not
          only five centuries, but also the leap into electronic
          typesetting, remaining essentially unchanged. It was
        </p>
        <h3>Vision</h3>
        <p>
          Lorem Ipsum is simply dummy text of the printing and
          typesetting industry. Lorem Ipsum has been
          the industry's standard dummy text ever since the
          1500s, when an unknown printer took a galley of type and
        </p>
        <h3>Mission</h3>
        <p>
          Lorem Ipsum is simply dummy text of the printing and
          typesetting industry. Lorem Ipsum has been
        </p>
      </div>
      <div class="contact_us">
        <h4>Contact Us</h4>
        <form action="/action_page.php">
          <label for="fname">First Name</label>
          <input type="text" id="fname" name="firstname" placeholder="Your name..">

          <label for="lname">Last Name</label>
          <input type="text" id="lname" name="lastname" placeholder="Your last name..">

          <label for="country">Country</label>
          <select id="country" name="country">
            <option value="australia">Australia</option>
            <option value="canada">Canada</option>
            <option value="usa">USA</option>
          </select>

          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  <!--Main container -->

  <!--Footer-->
  <footer class="footer">
    <hr>
    <!--Copyright-->
    <div class="footer_copyright">
       Copyright &copy; 2018 <a href="#">Kilombero Sugarcane Records Information System</a>.
    </div>
    <!--/.Copyright-->
  </footer>
  <!--/.Footer-->
</body>
</html>
