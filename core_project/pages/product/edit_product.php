<?php

  if(isset($_POST["btnUpdate"])){
	  
	  $id=$_POST["txtId"];	  
	  $category_id=$_POST["cmbCategoryId"];
	  $name=$_POST["txtProductName"];
	  $old_price=$_POST["txtOldPrice"];
	  $new_price=$_POST["txtNewPrice"];
	  $uom_id=$_POST["cmbUoM"];
	  
	  $photo_tmp=$_FILES["file"]["tmp_name"];	
      $photo_name=$_FILES["file"]["name"];	  
	  $ext = pathinfo($photo_name, PATHINFO_EXTENSION);
	 
	 
	  $photo_loc="img/";
	  
	  $db->query("update item set name='$name',old_price='$old_price',new_price='$new_price',uom_id='$uom_id',category_id='$category_id',photo='$id.$ext' where id='$id'");
	  
	   
	   copy($photo_tmp,$photo_loc.$id.".$ext");
	   
	 	  
	  
	  echo "Success Updated";
	  
  }
  
  
  if(isset($_POST["btnEdit"])){
	  $id=$_POST["txtId"];
	  
	  $product_tbl=$db->query("select name,old_price,new_price,uom_id,category_id,photo from item where id='$id'");
	  
	  
	  list($pname,$old_price,$new_price,$uom_id,$category_id,$photo)=$product_tbl->fetch_row();
	}
  

?>
<a href="home.php?page=8">Back</a>
<form action="#" method="post" enctype="multipart/form-data">
  <div>ID<br/>
  <input type="text" name="txtId" value="<?php echo $id?>" readonly />
  </div>
  <div>Category<br/>
   
   <select name="cmbCategoryId">
     <?php
       $cate_table=$db->query("select id,name from item_category");
	   while(list($cid,$name)=$cate_table->fetch_row()){
		
		  if($cid==$category_id){
		    echo "<option value='$cid' selected>$name</option>";
		  }else{
		    echo "<option value='$cid'>$name</option>";
		  }
		
		}
	 
	 ?>
   </select>
 </div>
 <div>
    Product Name<br/>
    <input type="text" name="txtProductName" value="<?php echo isset($pname)?$pname:""?>" />
 </div>
 <div>
    Old Price<br/>
    <input type="text" name="txtOldPrice" value="<?php echo isset($old_price)?$old_price:""?>" />
 </div>
 <div>
    New Price<br/>
    <input type="text" name="txtNewPrice" value="<?php echo isset($new_price)?$new_price:""?>" />
 </div>
 <div>
 UoM<br/>
   <select name="cmbUoM">
    <?php
	  $tb_uom=$db->query("select id,name from item_uom");
	  while(list($uid,$uname)=$tb_uom->fetch_row()){
		  
		   if($uid==$uom_id){
		  
		     echo "<option value='$uid' selected>$uname</option>";
		   }else{
			   
			   echo "<option value='$uid'>$uname</option>";
			   
		   }
	  }
	?>
   </select>
 </div>
 <div>
  <?php 
  
    if(isset($photo)){
	  echo "<img src='img/$photo' width='100' />";	
	}
  
  ?>
  
   Photo<br/>
   <input  type="file" name="file"  />
 </div>
 <br/>
 <div>
 <input type="submit" name="btnUpdate" value="Save Change" />
 </div>
 
</form>