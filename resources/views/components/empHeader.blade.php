<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }} - Employee Attendance System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  
  <link href="{{ asset('extra_library/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="{{ asset('extra_library/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('extra_library/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('extra_library/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('extra_library/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('extra_library/remixicon/remixicon.css') }}" rel="stylesheet">
  

  <link href="{{ asset('css/style.css') }}" rel="stylesheet" >
  
  
</head>

<body>

  
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index" class="logo d-flex align-items-center">
        <img src="{{ asset('img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">EMPATTEND</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    

    

  </header>

  
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ $title == "Index" ? "" : "collapsed"}} " href="/employee/index">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $title == "Profile" ? "" : "collapsed"}} " href="/employee/profile">
          <i class="bi bi-journal-text"></i>
          <span>Update Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $title == "Employee Attendance" ? "" : "collapsed"}} " href="/employee/attendance-list">
          <i class="bi bi-bar-chart"></i>
          <span>Attendance List</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $title == "Report" ? "" : "collapsed"}} " href="/employee/report">
          <i class="bi bi-file-earmark-pdf"></i>
          <span>Reports</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-right"></i><span>Sign Out</span>
        </a>
      </li>
    </ul>
  </aside>