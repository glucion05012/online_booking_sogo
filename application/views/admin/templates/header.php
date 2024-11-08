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
  

<!-- REQUIRED SCRIPTS -->

<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Custom CSS -->
<!-- <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/login.css"> -->

<!-- DataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

<!-- Table to CSV JQ -->
<script src="<?php echo base_url()."assets/"; ?>js/table2csv.js" type="text/javascript"></script>

<!-- Font Awesome Icons -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- IonIcons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- Charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<!-- JQUERY ALERT -->
<!-- <script src="<?php echo base_url()."assets/"; ?>js/jAlert.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/jAlert.css" /> -->

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
                <option value="all" selected disabled>-- SELECT --</option>
                <option <?= $_SESSION['branch_id'] == 'all' ? 'selected=""' : '' ?> value="all" >ALL BRANCHES</option>
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

          <?php if($_SESSION['type'] == 'Super Admin'):  ?>
            <li class="nav-item">
                  <a href="<?php echo base_url(); ?>admin/users" class="nav-link" class="nav-link active">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Users</p>
                  </a>
            </li>
          <?php endif; ?>
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