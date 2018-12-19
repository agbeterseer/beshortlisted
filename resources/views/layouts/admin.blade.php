<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/ico" href="">
  <!--[if IE]>
  <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
  <![endif]-->
  <title>  Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('onlinetest/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('onlinetest/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('onlinetest/css/ionicons.min.css')}}">
  <!-- Admin Theme style -->
  <link rel="stylesheet" href="{{asset('onlinetest/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{asset('onlinetest/css/skin-black.css')}}">
  <!-- Select 2 -->
  <link rel="stylesheet" href="{{asset('onlinetest/css/select2.min.css')}}">
  <!-- DataTable -->
  <link rel="stylesheet" href="{{asset('onlinetest/css/datatables.min.css')}}">
<link href="{{ asset('css/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/assets/global/plugins/bootstrap-summernote/summernote.css') }}" rel="stylesheet" type="text/css" />
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black sidebar-mini">
@if (Auth::user()->is_admin())
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo" title="Online Test">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
      <!-- logo removed -->
      </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <a href="{{url('/board')}}" class="btn visit-btn" target="_blank" title="Visit Site">Visit Site <i class="fa fa-arrow-circle-o-right"></i></a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{Auth::user()->name}}</span>
              <i class="fa fa-user hidden-lg hidden-md hidden-sm"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Body -->
              <li><a href="{{url('/admin/profile')}}" title="Profile">Profile</a></li>
              <li>
                <a href="{{ route('logout') }}" title="Logout"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left info">
          <h4>{{Auth::user()->name}}</h4>
        </div>
      </div>
      <!-- Sidebar Menu -->;#][p#]
          <li class="{{$sett}}"><a href="{{url('/admin/settings')}}" title="Settings"><i class="fa fa-gear"></i> <span>Settings</span></a></li>
        
          <li><a href="{{url('/admin/my_reports')}}" title=">My Reports"><i class="fa fa-file-text-o"></i> <span>My Reports</span></a></li>
          <li><a href="{{url('/admin/profile')}}" title="My Profile"><i class="fa fa-file-text-o"></i> <span>My Profile</span></a></li>
      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (Session::has('added'))
      <div class="alert alert-success sessionmodal">
        {{session('added')}}
      </div>
    @elseif (Session::has('updated'))
      <div class="alert alert-info sessionmodal">
        {{session('updated')}}
      </div>
    @elseif (Session::has('deleted'))
      <div class="alert alert-danger sessionmodal">
        {{session('deleted')}}
      </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$page_header}}
        {{-- <small>Optional description</small> --}}
      </h1>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">    
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="{{url('/')}}" title="">  </a>.</strong> All rights reserved.
  </footer>
</div>
@endif
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="{{asset('onlinetest/js/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('onlinetest/js/bootstrap.min.js')}}"></script>
<!-- DataTable -->
<script src="{{asset('onlinetest/js/datatables.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('onlinetest/js/select2.full.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('onlinetest/js/adminlte.min.js')}}"></script>

  <script src="{{ asset('css/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
<script src="{{ asset('css/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>
<script src="{{ asset('css/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
 <script src="{{ asset('css/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>


<script type="text/javascript">
    
    $(document).ready(function() {
        $('#summernote_1').summernote({
            height:'300px',
            placeholder:'Body of email here...',


        });
        // body...
    });

    $(document).ready(function() {
        $('#summernote_2').summernote({
            height:'300px',
            placeholder:'Body of email here...',


        });
        // body...
    });

    $('#clear').on('click', function() {
        $('#summernote_1').summernote('code', null);

    });
        $('#clear').on('click', function() {
        $('#summernote_2').summernote('code', null);

    });
</script>

<script type="text/javascript">
$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
 </script>
<script>
  $(function () {
    $( document ).ready(function() {
       $('.sessionmodal').addClass("active");
       setTimeout(function() {
           $('.sessionmodal').removeClass("active");
      }, 4500);
    });

    $('#example1').DataTable({
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
      buttons: [
            {
               extend: 'print',
               exportOptions: {
                   columns: ':visible'
               }
            },
            'csvHtml5',
            'excelHtml5',
            'colvis',
          ]
    });

    $('#questions_table').DataTable({
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
      buttons: [
        {
           extend: 'print',
           exportOptions: {
               columns: ':visible'
           }
        },
        'csvHtml5',
        'excelHtml5',
        'colvis',
      ],
      columnDefs: [
        { targets: [7,8,9,10], visible: false},
      ]
    });

    $('#search').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
      "sDom": "<'row'><'row'<'col-md-4'B><'col-md-8'f>r>t<'row'>",
      buttons: [
            {
               extend: 'print',
               exportOptions: {
                   columns: ':visible'
               }
            },
            'excelHtml5',
            'csvHtml5',
            'colvis',
          ]
    });

    $('#topTable').DataTable({
      "order": [[ 5, "desc" ]],
      "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
      buttons: [
            {
               extend: 'print',
               exportOptions: {
                   columns: ':visible'
               }
            },
            'excelHtml5',
            'csvHtml5',
            'colvis',
          ]
    });
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
</body>
</html>
