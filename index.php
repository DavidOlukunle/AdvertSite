
<?php include "includes/db.php";  ?>
<!--i made an include folder that has all the refactored code of html to make the index page look less--> 

		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <style>
	div.img:hover{
		width:300px;
		height:300px;
	}
	div.img{
		width: 100px;
    height: 100px;
    background:;
    -webkit-transition: width 2s; /* For Safari 3.1 to 6.0 */
    transition: width 2s;
	}
</style> -->
<?php include "includes/header.php";   ?>
			<!--navigation section-->
		<?php include "includes/navigation.php"; ?>
		<!--page content-->
		<div class="container">
			<div class="row">
				<!--adverts entry column-->
				<div class="col-md-8">
				
				<?//php  include "includes/search.php"; ?>
					<?php
					$query="SELECT * FROM advert_posts where advert_status='published' ";
				 
					$result=mysqli_query($connection,$query);
					while ($row=mysqli_fetch_assoc($result)) {
						$advert_id=$row['advert_id'];
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
						<h2><a href="individualpost.php?p_id=<?php echo $advert_id ?>"><?php echo $advert_title ?></a></h2>
						<p class="lead"><a href="authors_posts.php?author=<?php echo $advert_author?> & p_id=<?php echo $advert_id;?>"><?php echo $advert_author ?></a></p>
						<p><span class="glyphicon glyphicon-time"></span><?php echo $advert_date ?></p>
						<hr>
						<div class="img"><img class="img-responsive" style="width:500px;"src="images/<?php echo $advert_image; ?>" alt="#"></div>
						<hr>
						<p><?php echo $advert_content ?></p>
						<a class="btn btn-primary" href="individualpost.php" >Read more<span class="glyphicon glyphicon-cheveron-right"></span></a>
						<p><?php echo $advert_contact ?></p>
						
						<hr>
						<hr>


				<?php	}  ?>
				
				
			</div>


				<!--sidebar-->



			<?php include "includes/sidebar.php" ?>
		</div>
	<?php "includes/search.php"; ?>
</div>






							

<div class="pagination center">
	<a href="">1</a>
	<a href="">2</a>
	<a href="">3</a>

</div>













						
				
			
			
<!--footer -->
<footer>
	<div class="row">
		<div class="col-lg-12">
			<p>copyright &copy; your website 2021</p>
			</div>
			</div>

		</footer>

		</body>


</html>