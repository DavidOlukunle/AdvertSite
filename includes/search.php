 <?php include "db.php" ?>
<?php include "header.php"   ?>
			<!--navigation section-->
		<?php include "navigation.php" ?>
		<!--page content-->
		<div class="container">
			<div class="row">
				<!--adverts entry column-->
<div class="col-md-8">
<?php
	if(isset($_POST['submit'])){
		$search= $_POST['search'];

		$query="SELECT * FROM advert_posts WHERE advert_tags like '%$search%' ";
		$result=mysqli_query($connection,$query);
		if(!$result){
			die("query failed".mysqli_error($connection));
		} 
		$count=mysqli_num_rows($result);
		if($count == 0){
			echo "<h1>NO RESULT</h1>";
		}
		else{
			/*$query="SELECT * FROM advert_posts";
					$result=mysqli_query($connection,$query);*/
					while ($row=mysqli_fetch_assoc($result)) {
						$advert_title=$row['advert_title'];
						$advert_author=$row['advert_author'];
						$advert_date=$row['advert_date'];
						$advert_image=$row['advert_image'];
						$advert_content=$row['advert_content'];
						$advert_contact=$row['advert_contact'];
						?>


						<!--break-->
						<h1 class="page-header">page heading<small>Secondary Text</small></h1>
						<!--first advert post-->
						<h2><a href="#"><?php echo $advert_title ?></a></h2>
						<p class="lead"><a href="index.php"><?php echo $advert_author ?></a></p>
						<p><span class="glyphicon glyphicon-time"></span><?php echo $advert_date ?></p>
						<hr>
						<img class="img-responsive" src="images/<?php echo $advert_image; ?>" alt="#">
						<hr>
						<p><?php echo $advert_content ?></p>
						<a class="btn btn-primary" href="#" >Read more<span class="glyphicon glyphicon-cheveron-right"></span></a>
						<p><?php echo $advert_contact ?></p>
						<hr>
						<hr>


				<?php	}  
				
				
			

		}
	}
	?>
	
</div>
<?php include "sidebar.php" ?>


</div>
<!--footer -->
<footer>
	<div class="row">
		<div class="col-lg-12">
			<p>copyright &copy; your website 2021</p>
			</div>
			</div>

		</footer>
	</div>
		</body>


</html>

