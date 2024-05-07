<?php
      
	  if(isset($_POST["btnDelete"])){
		  $user_id=$_POST["txtId"];
		  
		  User::delete($user_id);
		  
		  //$db->query("delete from user where id='$user_id'");
		  echo "Deleted";
		  
	   }
	   
	   
	 User::show_all();  
	   
  
   
?>