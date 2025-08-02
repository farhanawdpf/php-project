<?php  session_start();
include "config/database.php";
date_default_timezone_set("Asia/Dhaka");
 include_once("includes/header.php");
 include_once("includes/main_bar.php");

?>
<section class="main-content mt-5"> 
	<div class="container-fluid">
		<div class="row"> 
			<?php include "placeholder.php" ; ?>
		</div>
	</div>
</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
      
        <?php
       include("placeholder.php");
        ?>
       
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once("includes/footer.php"); ?>
