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

  <title>Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/css/fontawesome.all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
    </ul>
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/user-profile.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <?php  if (($_SESSION['usertype'] == 'owner') ){
?>
          <a href="#" class="d-block">Halls Owner</a>

    <?php    }else {

 if( ($_SESSION['adminType']=='1') ){?>
  <a href="#" class="d-block">Admin</a>
  ?>
  <?php
}
if (($_SESSION['adminType']=='2')){

  ?>
  <a href="#" class="d-block">Super Admin</a>
  <?php 
      }
            
}?>

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if( ($_SESSION['usertype'] != 'owner') ){?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
             <?php
              if (($_SESSION['adminType']=='2')){

                ?>
                <p>
                Admins Pages
                <i class="right fas fa-angle-left"></i>
              </p>
                <?php
              }else if (($_SESSION['adminType']=='1')){
?>
   <p>
                user Pages
                <i class="right fas fa-angle-left"></i>
              </p>

  <?php            }
             ?>
             
              
            </a>

            
            <ul class="nav nav-treeview">
            <?php
            if($_SESSION['adminType']=='2'){?> <!-- super admin -->
              <li class="nav-item">
                <a href="showadmins.php" class="nav-link active ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>show Admins List</p>
                </a>
  
              </li>
              <li class="nav-item">
                <a href="createadmin.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new admin</p>
                </a>
              </li>
              <?php  } ?>

              <li class="nav-item">
                <a href="showusers.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>show Users List</p>
                </a>
              </li>
            
            </ul>
          </li>
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Halls page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="showhalls.php" class="nav-link active ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>show Halls</p>
                </a>
  
              </li>
            </ul>
            
          </li>
          <?php }?>

          <?php if( ($_SESSION['usertype'] == 'owner') ){?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Halls page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="showhallowner.php" class="nav-link active ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>show Halls</p>
                </a>
  
              </li>
              <li class="nav-item">
                <a href="createhall.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new hall</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="showlistFeedBacksubhall.php" class="nav-link  ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>show Halls FeedBack</p>
                </a>
  
              </li>
              <li class="nav-item">
                <a href="ShowReservations.php" class="nav-link ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Reservation Requests</p>
                </a>
  
              </li>
     

           
      
              
              <li class="nav-item">
                <a href="Showresowner.php" class="nav-link  ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>show Reservations</p>
                </a>
  
              </li>

              
            
              
  
            
              
  
            
              

  
            </ul>
          </li>  <?php }?>



          <?php if( ($_SESSION['usertype'] != 'owner') ){?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Features page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="showfeatures.php" class="nav-link active ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>show Features</p>
                </a>
  
              </li>
              <li class="nav-item">
                <a href="createfeature.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new feature</p>
                </a>
              </li>       
  
            </ul>
          </li>
          <?php }?>

          <?php if( ($_SESSION['usertype']!= 'owner') ){?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                FeedBack pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ShowFeedBack.php" class="nav-link active ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>show FeedBack For Website</p>
                </a>
  
              </li>
              <li class="nav-item">
                <a href="showfeedbacksubhallAdmin.php" class="nav-link active ">
                  <i class="far fa-circle nav-icon "></i>
                  <p>show FeedBack For Halls</p>
                </a>
  
              </li>
              
  
            </ul>
          </li>

       

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Page three
              </p>
            </a>
          </li>
          <?php }?>
        </ul>
      </nav>
      <?php if( ($_SESSION['usertype']!= 'owner') ){?>
      <div class="float-left d-none d-sm-inline">
    <a class="dropdown-item" href="../admin/handlers/logout.php">logout</a>
    </div>
    <?php }else{?>
      <div class="float-left d-none d-sm-inline">
    <a class="dropdown-item" href="../admin/handlers/logout.php">Back to Home</a>
    </div>
    <?php }?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">


        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->