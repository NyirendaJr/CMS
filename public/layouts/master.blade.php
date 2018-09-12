<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Canegrower Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- toastr -->
  <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
     <!-- Logo -->
     <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">KIS</span>
      <!-- logo for regular state and mobile devices -->
      <img src="{{asset('img/ilovo.png')}}" alt="logo" style="width: 120px;height:60px;">
    </a>
  

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
        <a class="navbar-brand" href="#">KSRMS</a><br>
    </nav>


  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/avatar5.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->firstname }}  ({{ Auth::user()->category }})</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="/home"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="{{ Request::is('farmer') ? 'active' : '' }}"><a href="/farmer"><i class="fa fa-list"></i> <span>Farmers</span></a></li>
        @if(Auth::user()->category =="Manager" or Auth::user()->category =="Admin")
        <li class="{{ Request::is('staff') ? 'active' : '' }}"><a href="/staff"><i class="fa fa-list"></i> <span>Staff</span></a></li>
        <li class="{{ Request::is('manager') ? 'active' : '' }}"><a href="/manager"><i class="fa fa-list"></i> <span>Managers</span></a></li>
        @endif
        <li><a href="#"><i class="fa fa-list"></i> <span>Feedback</span></a></li>
        @if(Auth::user()->category =="Admin" or Auth::user()->category =="Staff")
        <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="/register"><i class="fa fa-plus"></i> <span>Register</span></a></li>
        @endif
        <li class="{{ Request::is('ynote') ? 'active' : '' }}"><a href="/ynote"><i class="fa fa-plus"></i> <span>Y-Notes</span></a></li>
        <li class="{{ Request::is('process') ? 'active' : '' }}"><a href="/process"><i class="fa fa-cog"></i> <span>On Process</span></a></li>
        <li class="{{ Request::is('invoice') ? 'active' : '' }}"><a href="/invoice"><i class="fa fa-info"></i> <span>Invoice</span></a></li>
        @if(Auth::user()->category == "Manager")
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/dailyR"><i class=""></i> Daily</a></li>
            <li><a href=""><i class=""></i> Weekly</a></li>
            <li><a href=""><i class=""></i> Monthly</a></li>
          </ul>
        </li>
        @endif
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background-color: #fff;">
       <h4 style="color: #616161;font-family: arial, sans-serif;text-transform: uppercase;font-weight: bold;color: #005983;text-shadow: 1px 1px 2px rgba(150, 150,150, 0.75);">KILOMBERO SUGARCANE RECORDS INFORMATION SYSTEM</h4>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- delete user modal -->
  <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
      <form id="deleteUrl" action="farm/" method="post">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete?</p>
              <input type="hidden" id="deleteId">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </form>
  </div><!-- /.modal -->




  <!-- delete ynote modal -->
  <div id="deleteYnoteModal" class="modal fade" tabindex="-1" role="dialog">
      <form id="deleteYnoteUrl" action="ynote/" method="post">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete?</p>
              <input type="hidden" id="deleteYnoteId">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </form>
  </div><!-- /.modal -->



  <!-- delete On process ynote modal -->
  <div id="deleteOnprocessYnoteModal" class="modal fade" tabindex="-1" role="dialog">
      <form id="deleteOnprocessYnoteUrl" action="final/" method="post">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete?</p>
              <input type="hidden" id="deleteOnprocessYnoteId">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </form>
  </div><!-- /.modal -->




  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Kilombero Sugarcane Records Information System</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript">
// notifications
@if(Session::has('info'))
    toastr.success('{{ Session::get('info') }}', 'Success Alert',
    {
      timeOut: 5000, progressBar: true,
      "positionClass": "toast-top-center",
    });
@endif

@if(Session::has('success'))
    toastr.success('{{ Session::get('success') }}', 'Success Alert',
    {
      timeOut: 5000, progressBar: true,
      "positionClass": "toast-top-center",
    });
@endif

@if(Session::has('failed'))
    toastr.warning('{{ Session::get('failed') }}', 'Warning',
    {
      timeOut: 5000, progressBar: true,
      "positionClass": "toast-top-center",
    });
@endif
</script>
</body>
</html>
