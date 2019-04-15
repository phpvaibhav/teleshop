  <?php $backend_assets = base_url().CRM_ADMIN_ASSETS;?>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
 <!--    <div class="pull-right hidden-xs">
      Anything you want
    </div> -->
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y") ?> <a href="javascript:void();">Company</a>.</strong> All rights reserved.
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo $backend_assets;?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $backend_assets;?>bootstrap/js/bootstrap.min.js"></script>
<!-- Material Design -->
<script src="<?php echo $backend_assets;?>dist/js/material.min.js"></script>
<script src="<?php echo $backend_assets;?>dist/js/ripples.min.js"></script>
<script>
    $.material.init();
</script>
<!-- AdminLTE App -->
<script src="<?php echo $backend_assets;?>dist/js/app.min.js"></script>

</body>
</html>
