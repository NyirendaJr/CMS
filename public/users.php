<?php
require_once('../includes/init.php');

// delete user
if (isset($_GET['id'])) {
  $user_id = $_GET['id'];
  $user = new User();
  $user->id = $user_id;
  $user->delete();
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
      <div class="list_of_users">
        <?php if (isset($_GET['name'])){echo "<h2>List of ".$_GET['name']."</h2>";} ?>
        <table>
            <tr>
              <th>S/N</th>
              <th>Reg Number</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>phone</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
            <?php $counter = 1; ?>
            <?php
            if (isset($_GET['cat'])) {
               $cat_id = $_GET['cat'];
               $users = User::find_by_category($cat_id);
               foreach ($users as $key => $value) {
                 ?>
                 <tr>
                   <td><?php echo $counter++ ?></td>
                   <td><?php echo $value->regNo ?></td>
                   <td><?php echo $value->firstname ?></td>
                   <td><?php echo $value->lastname ?></td>
                   <td><?php echo $value->phone ?></td>
                   <td><?php echo $value->gender ?></td>
                   <td><?php echo $value->email ?></td>
                   <td>
                      <a href="edit_users.php?user_id=<?php echo $value->id?>" class="">Edit</a>
                      <a href="users.php?id=<?php echo $value->id?>">Delete</a>
                   </td>
                 </tr>
                 <?php
               }
            }
            ?>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
