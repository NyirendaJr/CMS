<?php
require_once('../includes/init.php') ;
if(!$session->is_logged_in()){redirect_to("login.php");}
isset($_GET['pay_ynote_id_url']) ? $_GET['pay_ynote_id_url'] : '';
  $pay_ynote_id_url = $_GET['pay_ynote_id_url'];

// add new ynote
if (isset($_POST['submit'])) {
  $amount       = trim($_POST['amount']);
  $pay_ynote_id = trim($_POST['pay_ynote_id']);
  $ynote_amount = Ynote::find_by_id($pay_ynote_id);

  // update ynote table
  $ynote             = new Ynote();
  $ynote->id         = $pay_ynote_id;
  $ynote->farmerNo   = $ynote_amount->farmerNo;
  $ynote->carRegNo   = $ynote_amount->carRegNo;
  $ynote->tone       = $ynote_amount->tone;
  $ynote->sucrose    = $ynote_amount->sucrose;
  $ynote->total_pay  = $amount;
  $ynote->created_at = $ynote_amount->created_at;
  $ynote->updated_at = $ynote_amount->updated_at;
  $ynote->status     = "Paid";
  $ynote->update();

  // create invoice
  $invoice              = new Invoice();
  $invoice->invoiceNo   = '383838839';
  $invoice->ynote_id    = $ynote_amount->id;
  $invoice->farmerNo    = $ynote_amount->farmerNo;
  $invoice->tone        = $ynote_amount->tone;
  $invoice->total_pay   = $ynote_amount->total_pay;
  $invoice->amount_paid = $amount;
  $invoice->receiptNo   = 'AB119920';
  $invoice->created_at  = $ynote_amount->created_at;

  // save data
  $invoice->save();
  redirect_to('y-note.php');
} else {
  $amount = "";
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
        <form action="pay-ynote.php" method="post">
          <div class="list_of_ynote">
            <h3>Add Payment</h3>
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
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter = 1; ?>
                <?php $ynote = Ynote::find_by_id($pay_ynote_id_url); ?>
                <input type="hidden" name="pay_ynote_id" value="<?php echo $ynote->id ?>">
                  <tr>
                    <td><?php echo $counter++ ?></td>
                    <td><?php echo $ynote->farmerNo ?></td>
                    <td><?php echo $ynote->carRegNo ?></td>
                    <td><?php echo $ynote->tone ?></td>
                    <td><?php echo $ynote->sucrose ?></td>
                    <td><?php echo $ynote->total_pay ?></td>
                    <td><?php echo $ynote->created_at ?></td>
                    <td><?php echo $ynote->status ?></td>
                    <td><input type="text" name="amount" required></td>
                  </tr>
              </tbody>
            </table>
            <hr>
            <input type="submit" name="submit" value="Save">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
