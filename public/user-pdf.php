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
<div class="box">
  <div class="box-header">
  <h4 style="color: #616161;font-family: arial, sans-serif;text-transform: uppercase;font-weight: bold;color: #005983;text-shadow: 1px 1px 2px rgba(150, 150,150, 0.75);">KILOMBERO SUGARCANE RECORDS INFORMATION SYSTEM</h4>
  @if(Request::is('farmer_pdf'))
    <h3 class="box-title">List of Farmers</h3>
  @else
   <h3 class="box-title">List of Staff</h3>
  @endif
  </div>
  <div class="box-body">
    <table class="table table-bordered table-condensed">
      <thead>
        <tr>
          <th>S/N</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>phone</th>
          <th>Reg No</th>
          <th>Gender</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php $counter = 1 ?>
        @forelse ($users as $key => $value)
        <tr>
          <td>{{$counter++}}</td>
          <td>{{$value->firstname}}</td>
          <td>{{$value->lastname}}</td>
          <td>{{$value->phone}}</td>
          <td>{{$value->regNo}}</td>
          <td>{{$value->gender}}</td>
          <td>{{$value->email}}</td>
        </tr>
        @empty
        @endforelse
      </tbody>

    </table>
  </div>
</div>
</body>
</html>