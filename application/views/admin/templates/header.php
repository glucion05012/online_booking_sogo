<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SOGO Online Booking System</title>
  
  <!-- Style CSS -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/style.css">
    
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="<?php echo base_url()."assets/"; ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url(); ?>home" class="nav-link">Home</a>

        
      </li>

    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-user-tie nav-icon"></i>
          <?php 
                foreach($branches as $bl){
                  if($bl['id'] == $_SESSION['branch_id']){
                    echo $_SESSION['name'] . ' - ' . $bl['name'];
                  }
                }
          ?>
        </a>
        <ul class="dropdown-menu">
          <li class="user-footer">
            <div class="pull-right">
              <a href="<?php echo base_url(); ?>admincontroller/logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="<?php echo base_url(); ?>home" class="nav-link" class="d-block"> SOGO<br>Online Booking System</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <select name="branches" id="branches" class="form-control" onchange="branchChange()">
                <option value="" selected disabled>-- SELECT --</option>
                <?php foreach($branches as $bl) : ?>
                    <option <?= $bl['id'] == $_SESSION['branch_id'] ? 'selected=""' : '' ?> value="<?php echo $bl['id']; ?>" ><?php echo $bl['name']; ?></option>
                <?php endforeach; ?>
            </select>
          </li>
          <br>
          <li class="nav-item has-treeview">
          <a href="#" class="nav-link active">
            <i class="fas fa-calendar nav-icon"></i>
            <p>
              Bookings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>admin/bookings" class="nav-link" class="nav-link active">
                <p>Active Bookings</p>
              </a>
              <a href="<?php echo base_url(); ?>admin/history" class="nav-link" class="nav-link active">
                <p>Booking History</p>
              </a>
            </li>
          </ul>
        </li>
        <?php if($_SESSION['type'] != 'Room Reservations'):  ?>
          <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/manage_rooms" class="nav-link" class="nav-link active">
                  <i class="fas fa-bed nav-icon"></i>
                  <p>Manage Rooms</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/calendar" class="nav-link" class="nav-link active">
                  <i class="fas fa-calendar nav-icon"></i>
                  <p>Inventory Calendar</p>
                </a>
          </li>
        <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

                                   
  <script>
        
        if("<?php echo $_SESSION['type']; ?>" == "Super Admin"){
          $('#branches').attr("disabled", false);
        }else{
          $('#branches').attr("disabled", true);
        }

      function branchChange() {


        // alert(name);
        var branch_id = $('#branches').find(":selected").val();
        var branch_name = $('#branches').find(":selected").text();
        var base_url = <?php echo json_encode(base_url()); ?>;

        $.ajax({
            type: "POST",
            url: base_url + "admincontroller/branchSession",
            data: { 
                    branch_id : branch_id,
                    branch_name : branch_name
                  },
            dataType: 'json',
            success: function (data) {
            }
        });

        
        location.reload();
      }
  </script>