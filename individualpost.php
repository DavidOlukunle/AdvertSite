<?php include "includes/db.php";  ?>
<!--i made an include folder that has all the refactored code of html to make the index page look less--> 
<?php 

if(isset($_GET['p_id'])){
	$advert_id=$_GET['p_id'];
}
?>

<!--query for comment section -->
<?php 
if(isset($_POST['submit'])){
	$the_advert_id=$_GET['p_id'];
	$comment_author=$_POST['author'];
	$comment_email=$_POST['email'];
	$comment_content=$_POST['comment'];
	if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ){
	$query="INSERT INTO comment(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)";
	$query.="VALUES ($the_advert_id,'{$comment_author}','{$comment_email}' , '{$comment_content}' ,'unapproved', now())";
	$result=mysqli_query($connection,$query);
	if(!$result){
		die("QUERY FAILED".mysqli_error($connection));
	}
}
else{echo "<script>alert('fields can not be empty')</script>";}
}

?>
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
					$query="SELECT * FROM advert_posts where advert_id= '{$advert_id}' ";
					$result=mysqli_query($connection,$query);
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
						<!--comment form -->
						<h4>Leave a Comment</h4>
						<form action="" method="post">
							<div class="form-group">
								<label for="">Author</label>
								<input type="text" class="form-control"name="author">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control"name="email">
							</div>
							<div class="form-group">
								<label for="">Your comment</label>

						<textarea class="form-control" cols="5" rows="5" name="comment">
						</textarea>
					</div>
						<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary">send</button>
					</div>
					</form>
						<hr>
						<hr>
						
						<!--sidebar-->
				<!--showing of comments below the comment box --->

					<?php } ?>
					<?php


if(isset($_GET['p_id'])){
	$the_advert_id=$_GET['p_id'];




						
				$query="SELECT * FROM comment WHERE comment_post_id= '$the_advert_id' ";
				$query.="AND comment_status='approved' ";
				$query.="ORDER BY comment_id DESC";
				$the_result=mysqli_query($connection,$query);
				if(!$the_result){
					die("QUERY FAILED".mysqli_error($connection));
				}
			}
				while($row=mysqli_fetch_array($the_result)){
					$comment_date=$row['comment_date'];
					$comment_author=$row['comment_author'];
					$comment_content=$row['comment_content'];
				
			
				?>
				<!---posted comments-->
				<div class="card" style="">
					<div class="card-left">
						<img class="card-object" src="http://placehold.it/64x64"alt=""></div>
						<div class="card-body">
							<h4 class="card-heading"><?php echo $comment_author; ?></h4>
							<small><?php echo $comment_date; ?></small>
							<h4><?php echo $comment_content; ?> </h4>
						</div>


					</div>


<?php } ?>
				






				
				
				
			</div>

				
				

			<?php include "includes/sidebar.php" ?>
		</div>
	<?php "includes/search.php"; ?>
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