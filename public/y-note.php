<?php
require_once('../includes/init.php');
if(!$session->is_logged_in()){redirect_to("login.php");} 
?>
<?php
  isset($_GET['userid']) ? $_GET['userid'] : '';
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
    $ynote->tone = 0.000;
    $ynote->sucrose = 0.0000;
    $ynote->total_pay = 0.000;
    $ynote->status = 'Not Paid';
    $ynote->created_at;
    $ynote->updated_at;
    $ynote->save();
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

// calculate total payment
// if ($_GET['t_ynote_id']) {
//    //$ynote_id = $_GET['t_ynote_id'];
// }
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
          <h3>List of Y-note</h3>
          <hr>
          <table>
            <thead>
              <tr>
                <th>S/N</th>
                <th>Farmer Number</th>
                <th>VIN</th>
                <th>Tone</th>
                <th>Sucrose</th>
                <th>Total Payment</th>
                <th>Date</th>
                <th>Status</th>
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
                  <td><?php echo Ynote::reCalculateTotalPayment($value->id) ?></td>
                  <td><?php echo $value->created_at ?></td>
                  <td><?php echo $value->status ?></td>
                  <td>
                     <a href="pay-ynote.php?pay_ynote_id_url=<?php echo $value->id?>">Pay</a>
                     <a href="edit-ynote.php?ynote_id=<?php echo $value->id?>">Edit</a>
                     <a href="y-note.php?del_ynote_id=<?php echo $value->id?>">Delete</a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
          <hr>
          <p>Average Sucrose: <b><?php echo Ynote::calculateSucroseAvg(); ?></b></p>
          <hr>
          <a href="#">Create PDF</a>
          <a href="#">Pay All</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
