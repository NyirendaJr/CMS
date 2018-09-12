<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
 <!-- Main content -->
 <section class="invoice">
 <h4 style="color: #616161;font-family: arial, sans-serif;text-transform: uppercase;font-weight: bold;color: #005983;text-shadow: 1px 1px 2px rgba(150, 150,150, 0.75);">KILOMBERO SUGARCANE RECORDS INFORMATION SYSTEM</h4>
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h4 class="page-header">
          <i class="fa fa-report"></i> Daily Report
          <small class="pull-right">Date: {{ $today }}</small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <address>
          <strong>Total Number of Farmer:</strong> {{ $totalF }}<br>
          <strong>Total Number of Y-note:</strong> {{ $totalY }}<br>
          <strong>Total Number of Paid Farmer:</strong> {{ $totalI }}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
       
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
       
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>Average Sucrose</th>
            <th>Total Number Of Y-note</th>
            <th>Total Amount</th>
            <th>Total Amount Paid</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>{{ $avg_sucrose }}</td>
            <td> {{ $totalY }}</td>
            <td>{{$sumYnote }}</td>
            <td>{{ $sumYnotePaid }}</td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
  </body>
  </html>