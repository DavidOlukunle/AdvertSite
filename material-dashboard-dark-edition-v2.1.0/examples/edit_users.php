<?php 
include "admindatabase.php";?>
<?php
if(ISSET($_GET['edit'])){
	$edit=$_GET['edit'];
}
  
      
      $query="SELECT * FROM user where user_id=$edit ";
      $select_users= mysqli_query($connection,$query);
      while($row=mysqli_fetch_assoc($select_users)){
        $user_id=$row['user_id'];
        $user_firstname=$row['user_firstname'];
 $user_lastname=$row['user_lastname'];
         $user_role=$row['user_role'];
        $username=$row['username'];
       $user_email=$row['user_email'];
  $user_password=$row['user_password'];
        $user_role=$row['user_role'];

}



if(ISSET($_POST['update'])){

	//$user_id=$_POST['user_id'];     
     $user_firstname=$_POST['user_firstname'];
	$user_lastname=$_POST['user_lastname'];
	$user_role=$_POST['user_role'];
	$username=$_POST['username'];
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];


	$query="UPDATE user set ";
	$query .="user_firstname ='{$user_firstname} '," ;
	$query.="user_lastname ='{$user_lastname}', ";
	$query.="user_role = '{$user_role}', ";
	$query.= "username ='{$username}', ";
	$query.="user_email ='{$user_email}', ";
	$query.="user_password ='{$user_password}' "; 
	
	$query.="WHERE user_id = {$user_id}";

	$result=mysqli_query($connection,$query);
	}
	
	
	//$advert_image=$_FILES['Advert_image']['name'];
	//$advert_image_temp=$_FILES['Advert_image']['tmp_name'];
	
		//$advert_date=date('d-m-y');



	//	$fileupload=move_uploaded_file($advert_image_temp, 'images/$Advert_image');
		//if(!$fileupload){
		//	echo 'image not uploaded';
		//}
		//else{
		//	echo "file uploaded";
		//}

		
	//	$query="INSERT INTO user(user_firstname,user_lastname,user_role,username,user_email,user_password) ";
	//$query.="VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}', '{$user_password}')";

	//  $result= mysqli_query($connection,$query);
	//  if(!$result){
	 //	die("QUERY FAILED". mysqli_error($connection));
	//  }













  ?>


<!DOCTYPE HTML>
<html lang="en">
	<head>
	<title></title><link rel="stylesheet" type="text/css" href="../vendor/bootstrap.min.css">
	<script type="text/javascript" src="../vendor/jquery.min.js"></script>
	<script type="text/javascript" src="../vendor/popper.min.js"></script>
	<script type="text/javascript" src="../vendor/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
</head>
		<body>




<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label for="title">Firstname</label>
	<input value="<?php echo $user_firstname?>" type="text" name="user_firstname" class="">
</div>
<div class="form-group">
	<label for="Advert-contact">lastname</label>
	<input type="text" value="<?php echo $user_lastname ?>" name="user_lastname"class="form-control">
</div>
<div class="form-group">
	<select name="user_role" id="$user_id">
		<option value="subscriber">select option</option>
		<option value="admin">Admin</option>
		<option value ="subscriber">Subsriber</option>
	</select>
</div>


<div class="form-group">
	<label for="Advert-tags">Username</label>
	<input type="text" value="<?php echo $username?>" name="username"class="form-control">
</div>
<div class="form-group">
	<label for="Advert-content">Email</label>
	<input type="email" value="<?php echo $user_email?> " class="form-control" name="user_email"id="">
</div>
<div class="form-group">
	<label for="Password">Password</label>
	<input type="text" value="<?php echo $user_password?>"  class="form-control" name="user_password"id=""> 
</div>

<!--div class="form-group">
	<label for="image">Advert-image</label>
	<input type="file" name="Advert_image">
</div-->
<div class="form-group">
	<input class="btn btn-warning" type="submit" name="update" value="update">
</div>
</form>
</body>
</html>