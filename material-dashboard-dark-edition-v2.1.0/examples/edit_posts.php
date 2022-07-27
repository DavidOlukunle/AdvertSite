<?php include "admindatabase.php";   ?>
<?php include "header.php"; ?>

      <?php 

      if(isset($_GET['edit'])){
      	$edit=$_GET['edit'];
}


      $query="SELECT * FROM advert_posts where advert_id=$edit ";
      $select_advert_by_id= mysqli_query($connection,$query);
      while($row=mysqli_fetch_assoc($select_advert_by_id)){
        $advert_id=$row['advert_id'];
        $advert_title=$row['advert_title'];
        $advert_date=$row['advert_date'];
        $advert_image=$row['advert_image'];
        $advert_author=$row['advert_author'];
        $advert_content=$row['advert_content'];
        $advert_contact=$row['advert_contact'];
        $advert_tags=$row['advert_tags'];
}
if(isset($_POST['create-Advert'])){
	$advert_title=$_POST['advert_title'];
	$advert_Author=$_POST['advert_author'];
	$advert_content=$_POST['advert_content'];
	$advert_tags=$_POST['advert_tags'];
	$advert_contact=$_POST['advert_contact'];
	
	$advert_image=$_FILES['advert_image']['name'];
	$advert_image_temp=$_FILES['advert_image']['tmp_name'];

	$fileupload=move_uploaded_file($advert_image_temp, 'images/$Advert_image');
	$query="UPDATE advert_posts set ";
	$query .="advert_title ='{$advert_title} '," ;
	$query.="advert_author ='{$advert_Author}', ";
	$query.="advert_date = now(), ";
	$query.= "advert_content ='{$advert_content}', ";
	$query.="advert_tags ='{$advert_tags}', ";
	$query.="advert_contact ='{$advert_contact}', "; 
	$query.="advert_image ='{$advert_image}' ";
	$query.="WHERE advert_id= {$advert_id}";


	$result=mysqli_query($connection, $query);
	if(!$result){
  die("QUERY FAILED" .  mysqli_error($connection));
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

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label for="title">Advert-title</label>
	<input value="<?php  if(isset($advert_title)){echo $advert_title;}?>" type="text" name="advert_title" class="">
</div>
<div class="form-group">
	<select name="" id="">
	</select>
</div>
<div class="form-group">
	<label for="Advert-contact">Advert-contact</label>
	<input value="<?php  if(isset($advert_contact)){echo $advert_contact;}?>" type="text" name="advert_contact"class="form-control">
</div>
<div class="form-group">
	<label for="Advert-Author">Advert-Author</label>
	<input value="<?php  if(isset($advert_author)){echo $advert_author;}?>" type="text" name="advert_author"class="form-control">
</div>


<div class="form-group">
	<label for="Advert-tags">Advert-tags</label>
	<input value="<?php  if(isset($advert_tags)){echo $advert_tags;}?>" type="text" name="advert_tags"class="form-control">
</div>
<div class="form-group">
	<label for="Advert-content">Advert-content</label>


	<textarea  class="form-control" name="advert_content"id="" cols="10" rows="10">
		<?php  if(isset($advert_content)){echo $advert_content;}?>
	</textarea>

</div>

<div class="form-group">
	<img width='100' src="images/<?php echo $advert_image; ?>" >
	<input type="file" name="advert_image">
</div>
<div class="form-group">
	<input class="btn btn-warning" type="submit" name="create-Advert" value="publish-advert">
</div>
</form>
</html>
<?php 
echo strlen('iusesomecrazystringss22');
?>
