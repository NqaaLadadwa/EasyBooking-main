<?php session_start();

if(!isset($_SESSION['adminId'])){
  header("location: login.php");
}

require("inc/header.php");

?>



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->

    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="js/bootstrap.bundle.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
</body>
</html>
