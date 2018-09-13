<?php require_once('../includes/init.php') ?>
<?php
// add new ynote
if (isset($_POST['submit'])) {
  $carRegNo = trim($_POST['carRegNo']);
  $farmerNo = trim($_POST['farmerNo']);

  // check if user exist
  $res = Ynote::is_user_exist($farmerNo);
  if ($res != []) {
    //create new instance of Ynote Model
    $ynote = new Ynote();
    $ynote->farmerNo = $farmerNo;
    $ynote->carRegNo = $carRegNo;
    $ynote->tone = NULL;
    $ynote->sucrose = NULL;
    $ynote->created_at;
    $ynote->updated_at;
    $rs = $ynote->save();
  } else {
    $message = "This user is note registered";
  }
} else {
  $carRegNo = "";
  $farmerNo = "";
}

// delete ynote
if (isset($_GET['del_ynote_id'])) {
  $id = $_GET['del_ynote_id'];
  $ynote = new Ynote();
  $ynote->id = $id;
  $ynote->delete();
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
      <div class="content_body">
        <div class="add_ynote">
         <?php if (isset($message)) {echo output_message($message);} ?>
          <p>Add New Y-note</p>
          <form action="y-note.php" method="post">
            <label for="farmerNo">Farmer No:</label>
            <input type="text" name="farmerNo" placeholder="Farmer reg No" required>
            <label for="carRegNo">Car Number:</label>
            <input type="text" name="carRegNo" placeholder="Car reg No" required>
            <input type="submit" value="Submit" name="submit">
          </form>
        </div>
        <div class="list_of_ynote">
          <h2>List of Y-note</h2>
          <table>
            <thead>
              <tr>
                <th>S/N</th>
                <th>Farmer Number</th>
                <th>VIN</th>
                <th>Tone</th>
                <th>Sucrose</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter = 1; ?>
              <?php $ynotes = Ynote::find_all("ynotes"); ?>
              <?php foreach ($ynotes as $key => $value) {
                ?>
                <tr>
                  <td><?php echo $counter++ ?></td>
                  <td><?php echo $value->farmerNo ?></td>
                  <td><?php echo $value->carRegNo ?></td>
                  <td><?php echo $value->tone ?></td>
                  <td><?php echo $value->sucrose ?></td>
                  <td><?php echo $value->created_at ?></td>
                  <td>
                     <a href="edit-ynote.php?ynote_id=<?php echo $value->id?>">Edit</a>
                     <a href="y-note.php?del_ynote_id=<?php echo $value->id?>">Delete</a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
