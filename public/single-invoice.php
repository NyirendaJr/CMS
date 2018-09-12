@extends('layouts.master')

@section('content')
<br>
<div class="box">
   <div class="box-header">
     <h3 class="box-title">Invoice</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <table id="ynoteData" class="table table-bordered table-striped">
       <thead>
         <tr>
           <th>S/N</th>
           <th>Invoice No</th>
           <th>Farmer No</th>
           <th>Name</th>
           <th>Average Sucrose</th>
           <th>Tone</th>
           <th>Total Payment</th>
           <th>Amount Paid</th>
           <th>Receipt Mo</th>
           <th>Payment Due</th>
           @if(Auth::user()->category =="Manager" or Auth::user()->category =="Staff" or Auth::user()->category =="Admin")
           <th>Action</th>
           @endif
         </tr>
       </thead>
       <tbody>
         <?php $counter = 1 ?>
         @forelse($invoice as $key => $value)
         <tr>
           <td>{{ $counter++ }}</td>
           <td>{{ $value->invoiceNo }}</td>
           <td>{{ $value->formerNo }}</td>
           <td>{{ $value->firstname }}</td>
           <td>{{ $value->averageSucrose }}</td>
           <td>{{ $value->tone }}</td>
           <td>{{ $value->total_pay }}</td>
           <td>{{ $value->amount_paid }}</td>
           <td>{{ $value->receiptNo }}</td>
           <td>{{ $value->created_at }}</td>
           <td>          
            @if(Auth::user()->category == "Staff")
                <a href="" class="btn btn-success btn-sm">Edit</a>
                <button id="{{ $value->id }}" class="btn btn-danger btn-sm deleteOnprocessYnote">Delete</button>
            @endif
           </td>
         </tr>
         @empty
         @endforelse
       </tbody>
     </table>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->
@endsection