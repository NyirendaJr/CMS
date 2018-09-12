@extends('layouts.master')
@section('content')
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-report"></i> Daily Report.
          <small class="pull-right">Date: {{ $today }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Category
        <address>
          <strong>Total Number of Farmer</strong><br>
          <strong>Total Number of Y-note</strong><br>
          <strong>Total Number of Paid Farmer</strong><br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Value
        <address>
          {{ $totalF }}<br>
          {{ $totalY }}<br>
          {{ $totalI }}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
       
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <hr>
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
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

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
      <a href="{{ route('dailyRPDF') }}" class="btn btn-primary"><i class="fa fa-print"></i> Print Report</a>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

  <!-- /.content -->
@endsection