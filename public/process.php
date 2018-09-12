@extends('layouts.master')
@section('content')
<br>
<div class="box">
   <div class="box-header">
     <h3 class="box-title">On process Y-Notes</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <table id="ynoteData" class="table table-bordered table-striped">
       <thead>
         <tr>
           <th>S/N</th>
           <th>Farmer No</th>
           <th>Average Sucrose</th>
           <th>Tone</th>
           <th>Totoal Payment</th>
           <th>Status</th>
           @if(Auth::user()->category =="Admin" or Auth::user()->category =="Staff")
           <th>Action</th>
           @endif
         </tr>
       </thead>
       <tbody>
         <?php $counter = 1 ?>
         @forelse($processynote as $key => $value)
         <tr>
           <td>{{ $counter++ }}</td>
           <td>{{ $value->farmerNo }}</td>
           <td>{{ $value->sucrose_avg }}</td>
           <td>{{ $value->tone }}</td>
           @if(empty($value->total_pay))
             <td>
               <div class="overlay">
                 <i class="fa fa-spinner fa-spin"></i>
              </div>
             </td>
           @else
              <td>{{ $value->total_pay }}</td>
           @endif
           <td>
             <span class="label label-danger">
               {{ $value->status }}
             </span>
         </td>
          <td>

          @if(empty($value->tone) && empty($value->sucrose))
            <a href="ynote/{{ $value->id }}/edit " class="btn btn-success btn-sm">Edit</a>

            @if(Auth::user()->category =="Admin")
              <a href="#" class="btn btn-danger btn-sm">Delete</a>
            @endif

            @if(Auth::user()->category =="Staff")
              <a href="/process/{{ $value->id }}" class="btn btn-info btn-sm" disabled>Totol Payment</a>
            @endif


          @else

            @if(Auth::user()->category =="Admin" or Auth::user()->category == "Staff")
              <a href="" class="btn btn-success btn-sm">Edit</a>
            @endif

            @if(Auth::user()->category =="Admin")
              <button id="{{ $value->id }}" class="btn btn-danger btn-sm deleteOnprocessYnote">Delete</button>
            @endif

            @if(Auth::user()->category =="Staff")
              <a href="/invoice/{{$value->id}}/edit" class="btn btn-info btn-sm" >Pay</a>
            @endif

          @endif
          </td>
         </tr>
         @empty
         @endforelse
       </tbody>
     </table>
   </div>
   <!-- /.box-body -->
    <!-- Main content -->
  <section class="invoice">
   <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
       
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <!-- <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print Page</button> -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
 </div>
 <!-- /.box -->
@endsection
