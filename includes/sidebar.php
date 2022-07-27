<!---side bar widget---> 


<div class="col-sm-4">
<br><br>
<?php if(isset($_POST['submit'])){
	//echo $search=$_POST['search'];
}
?>

	<div class="card">

		<h4>Advert search</h4>
		<form action="includes/search.php" method="post">
		<div class="input-group">
			<input  name="search" type="text" class="form-control">
			<span class="input-group-btn">
				<button  name="submit" type="submit" class="btn btn-danger">
					<i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		</div>
		<br><br>
		<div class="card">
		<div class="row">
			<div class="card-body">
				<form action="includes/login.php" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" placeholder="username">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" placeholder="password" class="form-control"name="password"><span class="input-group-btn">
						<button  class="btn-btn-primary" name="login" type="submit">Submit</button></span>
				</div>
			</form>
			</div>
		</div>
		
		</div><br><br><BR>
	<div class="card">
		<?php  
						$query="SELECT * FROM categories";
						$result=mysqli_query($connection,$query); ?>
		<h4>blog categories</h4>
		<div class="row">
			<div class="col-sm-6">
				<ul class="list-unstyled">
					<?php while($row=mysqli_fetch_assoc($result)){
							$cat_title=$row['cat_title'];
					echo "<li class='nav-item' ><a href='#' class='nav-link' style='color:blue'>{$cat_title}</a></li>";

						}






						 ?>
				</ul>
			</div>
		</div>
	</div>
	<br><br><br>
	<div class="card">
		<div class="row">
			<div class="card-body">
				<h3><b>Side widget Information</b></h3>
				<h5>i want to nuild a really cool and dynamic website that enables smooth interaction between buyers abd sellers. For this project,i have combined;html,css,bootstrap,php and mysql. I hope to use more  languages in the future to increase functionality</h5>
			</div>
		</div>
	</div>
	<br><br><br><br>
	<!--login page -->

	</div>


</div>


