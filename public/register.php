<?php
require_once('../includes/init.php');

// user registration
if (isset($_POST['register'])) {
    $user              = new User();
    $user->regNo       = $_POST['regNo'];
    $user->firstname   = $_POST['firstname'];
    $user->lastname    = $_POST['lastname'];
    $user->phone       = $_POST['phone'];
    $user->gender      = $_POST['gender'];
    $user->email       = $_POST['email'];
    $user->category_id = $_POST['category_id'];
    $user->password    = encrypt($_POST['password']);
    $user->save();
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
      <div class="home_sidebar_header">
        <div class="user_image">
           <img src="img/avatar5.png" alt="User Image">
        </div>
        <div class="user_role">
          <p>Admin</p>
        </div>
      </div>
      <div class="home_sidebar">
        <?php include_layout_template('sidebar') ?>
      </div>
    </div>
    <div class="content_section">
      <div class="register_wrapper">
        <h3>Registration Form</h3>
       <form action="register.php" method="post">
         <label>Reg Number</label>
         <input type="text" id="regNo" name="regNo" placeholder="Your Reg Number..">
         <label>First Name</label>
         <input type="text" id="fname" name="firstname" placeholder="Your name..">
         <label>Last Name</label>
         <input type="text" id="lname" name="lastname" placeholder="Your last name..">
         <label>Phone Number</label>
         <input type="text" id="phone" name="phone" placeholder="Your phone..">
         <label>Email</label>
         <input type="text" id="phone" name="email" placeholder="Your Email..">
         <label>Category</label>
         <select id="category" name="category_id">
           <?php
             $categories = Category::find_all();
             foreach ($categories as $key => $value) {
               ?>
               <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
               <?php
             }
            ?>
         </select>
         <label for="country">Gender</label>
         <select id="gender" name="gender">
           <option value="Male">Male</option>
           <option value="Fenale">Female</option>
         </select>
         <label>password</label>
         <input type="password" id="phone" name="password" placeholder="Your password..">
         <input type="submit" value="Register" name="register">
       </form>
      </div>
    </div>
  </div>
</body>
</html>
