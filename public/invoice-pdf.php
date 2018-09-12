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
<br>
<div class="box">
<h4 style="color: #616161;font-family: arial, sans-serif;text-transform: uppercase;font-weight: bold;color: #005983;text-shadow: 1px 1px 2px rgba(150, 150,150, 0.75);">KILOMBERO SUGARCANE RECORDS INFORMATION SYSTEM</h4>
   <div class="box-header">
     <h3 class="box-title">Invoice</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <table class="table table-bordered table-condensed">
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
           <!-- @if(Auth::user()->category =="Manager" or Auth::user()->category =="Staff")
           <th>Action</th>
           @endif -->
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
           <!-- <td>          
            @if(Auth::user()->category == "Staff")
                <a href="" class="btn btn-success btn-sm">Edit</a>
                <button id="{{ $value->id }}" class="btn btn-danger btn-sm deleteOnprocessYnote">Delete</button>
            @endif
        
            @if(Auth::user()->category =="Manager")
                <a href="/invoice/{{$value->id}}/edit" class="btn btn-info btn-sm" >view</a>
            @endif
           </td> -->
         </tr>
         @empty
         @endforelse
       </tbody>
     </table>
   </div>
</body>
</html>