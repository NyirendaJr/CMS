<?php
  require_once('../includes/init.php');

  // get registered ynote
  isset($_GET['ynote_id']) ? $_GET['ynote_id'] : '';
  $ynote_id = $_GET['ynote_id'];
  $ynote    = Ynote::find_by_id($ynote_id);

  // add ynote Delivery note
  if (isset($_POST['submit'])) {
     // update ynote
    $ynote_id = $_POST['ynote_id'];

     $ynote             = new Ynote();
     $ynote->id         = $ynote_id;
     $ynote->farmerNo   = $_POST['farmerNo'];
     $ynote->carRegNo   = $_POST['carRegNo'];
     $ynote->created_at = $_POST['created_at'];
     $ynote->tone       = $_POST['tone'];
     $ynote->sucrose    = $_POST['sucrose'];
     $ynote->update();

     // //calculate total payment
     $total_pay = Ynote::calculateTotalPayment($ynote_id);
     $ynote->total_pay  = $total_pay;
     $ynote->update();


     redirect_to('y-note.php');

  } else {
    $tone    = "";
    $sucrose = "";
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
  <style>
      input[type=text], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
      }

      label {
          padding: 12px 12px 12px 0;
          display: inline-block;
      }

      input[type=submit] {
          background-color: #4CAF50;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: right;
      }

      input[type=submit]:hover {
          background-color: #45a049;
      }

      .container {
          /* border-radius: 5px; */
          background-color: #f2f2f2;
          padding: 10px;
          /* border: 1px solid red; */
          width: 800px;
      }

      .col-25 {
          float: left;
          width: 15%;
          margin-top: 6px;
      }

      .col-75 {
          float: left;
          width: 75%;
          margin-top: 6px;
      }

      /* Clear floats after the columns */
      .row:after {
          content: "";
          display: table;
          clear: both;
      }

      /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
      @media screen and (max-width: 600px) {
          .col-25, .col-75, input[type=submit] {
              width: 100%;
              margin-top: 0;
          }
      }
</style>
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
      <div class="container">
        <h3 class="box-title">Add Ynote Delivery Note</h3>
        <hr>
       <form action="edit-ynote.php" method="post">
         <input type="hidden" name="ynote_id" value="<?php echo $ynote->id?>">
         <div class="row">
           <div class="col-25">
             <label>Farmer Number</label>
           </div>
           <div class="col-75">
             <input type="text" name="farmerNo" value="<?php echo $ynote->farmerNo?>">
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label>Truck Number</label>
           </div>
           <div class="col-75">
             <input type="text" name="carRegNo" value="<?php echo $ynote->carRegNo?>">
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label>Date</label>
           </div>
           <div class="col-75">
             <input type="text" name="date" value="<?php echo $ynote->created_at?>">
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label>Tones</label>
           </div>
           <div class="col-75">
             <input type="text" name="tone">
           </div>
         </div>
         <div class="row">
           <div class="col-25">
             <label>Sucrose</label>
           </div>
           <div class="col-75">
             <input type="text" name="sucrose">
           </div>
         </div>
         <div class="row">
           <div class="col-75">
             <input type="submit" value="Submit" name="submit">
           </div>

         </div>
       </form>
      </div>
    </div>
  </div>
</body>
</html>
