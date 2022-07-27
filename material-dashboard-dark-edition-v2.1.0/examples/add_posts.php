<?php 
include "admindatabase.php";


if(ISSET($_POST['create-Advert'])){
	$advert_title=$_POST['advert_title'];
	$advert_Author=$_POST['advert_author'];
	$advert_content=$_POST['advert_content'];
	$advert_tags=$_POST['advert_tags'];
	$advert_contact=$_POST['advert_contact'];
	
	$advert_image=$_FILES['Advert_image']['name'];
	$advert_image_temp=$_FILES['Advert_image']['tmp_name'];
	
		$advert_date=date('d-m-y');



		$fileupload=move_uploaded_file($advert_image_temp, "images/$advert_image");
		if(!$fileupload){
			echo 'image not uploaded';
		}
		else{
			echo "file uploaded";
		}

		
		$query="INSERT INTO advert_posts(advert_author,advert_content,advert_tags,advert_contact,advert_date,advert_image) ";
	$query.="VALUES('{$advert_Author}','{$advert_content}','{$advert_tags}','{$advert_contact}',now(),'{$advert_image}')";

	  $result= mysqli_query($connection,$query);
	  if(!$result){
	  	die("QUERY FAILED". mysqli_error($connection));
	  }




}








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
	<label for="title">Advert-title</label>
	<input type="text" name="advert_title" class="">
</div>
<div class="form-group">
	<label for="Advert-contact">Advert-contact</label>
	<input type="text" name="advert_contact"class="form-control">
</div>
<div class="form-group">
	<label for="Advert-Author">Advert-Author</label>
	<input type="text" name="advert_author"class="form-control">
</div>


<div class="form-group">
	<label for="Advert-tags">Advert-tags</label>
	<input type="text" name="advert_tags"class="form-control">
</div>
<div class="form-group">
	<label for="Advert-content">Advert-content</label>
	<textarea class="form-control" name="advert_content"id="" cols="10" rows="10"></textarea> 
</div>

<div class="form-group">
	<label for="image">Advert-image</label>
	<input type="file" name="Advert_image">
</div>
<div class="form-group">
	<input class="btn btn-warning" type="submit" name="create-Advert" value="publish-advert">
</div>
</form>
</body>