<?php  session_start();
include "config/database.php";
$db = new Database();
date_default_timezone_set("Asia/Dhaka");

if (!isset($_SESSION['s_id'])) {
	header("location:index.php");
}

include "header.php";
?>

<section class="main-menu"> 
	<?php include "main-menu.php" ?>
</section>

<section class="main-content mt-5"> 
	<div class="container-fluid">
		<div class="row"> 
			<?php include "placeholder.php" ; ?>
		</div>
	</div>
</section>



<?php include "footer.php"; ?>