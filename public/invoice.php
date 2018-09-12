@extends('layouts.master')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Payments
      </h1>
    </section>
        <!-- Main content -->
        <section class="content">

<!-- SELECT2 EXAMPLE -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Add Farmer Payment Info</h3>
  </div>
  @if ($errors->any())
      <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
      </ul>
   @endif
  <!-- /.box-header -->
  <form action="/invoice" method="post">
    {{ csrf_field() }}
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
         <input type="hidden" value="{{$invoice->ynote_id}}" name="ynote_id">
          <div class="form-group">
            <label>Receipt No</label>
            <input type="text" class="form-control" name="receiptNo" value="{{ old('receiptNo') }}">
            @if ($errors->has('receiptNo'))
                <span class="help-block" style="color: #ff0000;">
                    <strong>{{ $errors->first('receiptNo') }}</strong>
                </span>
            @endif
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Amount</label>
            <input type="text" class="form-control" name="amount_paid" value="{{ old('amount_paid') }}">
            @if ($errors->has('amount_paid'))
                <span class="help-block" style="color: #ff0000;">
                    <strong>{{ $errors->first('amount_paid') }}</strong>
                </span>
            @endif
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Invoice Number</label>
            <input type="text" class="form-control" name="invoiceNo" value="{{ $invoice_no }}">
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Farmer Number</label>
            <input type="text" class="form-control" name="farmerNo" value="{{ $invoice->farmerNo }}">
          </div>
          <!-- /.form-group -->
          <!-- /.form-group -->
          <div class="form-group">
            <label>Average Sucrose</label>
            <input type="text" class="form-control" name="sucrose_avg" value="{{ $invoice->sucrose_avg }}">
          </div>
          <!-- /.form-group -->
          <!-- /.form-group -->
          <div class="form-group">
            <label>Tone</label>
            <input type="text" class="form-control" name="tone" value="{{ $invoice->tone }}">
          </div>
          <!-- /.form-group -->
            <!-- /.form-group -->
          <div class="form-group">
            <label>Total Payment</label>
            <input type="text" class="form-control" name="total_pay" value="{{ $invoice->total_pay }}">
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </form>
   <!-- Main content -->
   <section class="invoice">
   <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
       
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
</div>
<!-- /.box -->

<div class="row">
  <div class="col-md-6">


  </div>
  <!-- /.col (left) -->
  <div class="col-md-6">
  
  </div>
</div>
</section>
<!-- /.content -->

 @endsection
