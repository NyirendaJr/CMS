@extends('layouts.master')
@section('content')
<!-- general form elements disabled -->
<br>
<div class="box box-warning">
  <div class="box-header with-border">
    <h2 class="box-title">Add Ynote Delivery Note</h2>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <form role="form" action="/ynote/{{$ynote->id}}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="form-group">
        <label>Farmer Number</label>
        <input type="text" name="farmerNo" value="{{ $ynote->farmerNo }}" class="form-control" disabled>
      </div>
      <div class="form-group">
        <label>Truck Number</label>
        <input type="text" name="carRegNo" value="{{ $ynote->carRegNo }}" class="form-control" disabled>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input type="text" name="carRegNo" value="{{ $ynote->created_at }}" class="form-control" disabled>
      </div>

      <div class="form-group">
        <label>Tones</label>
        <input type="text" name="tone" value="{{ empty($ynote->tone) ? '' : $ynote->tone}}" class="form-control" required autofocus>
      </div>
      <div class="form-group">
        <label>Sucrose</label>
        <input type="text" name="sucrose" value="{{ empty($ynote->tone) ? '' : $ynote->sucrose }}" class="form-control" required autofocus>
      </div>
      <button type="submit" class="btn btn-success">Save</button>
      <button type="cancel" class="btn btn-default">Cancel</button>
    </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
