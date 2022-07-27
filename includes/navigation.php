<?php include "db.php" ?>


<nav class="navbar navbar-expand-md   bg-dark navbar-light">
				<a class="navbar-header" href="#"><h1>ADVERT.COM</h1><!--img src="..//iesa_logo.png"--></a>
			<button class="navbar-toggler" type="button"data-toggle="collapse"data-target="#drop" aria-control="drop" aria-expanded="false" aria-label="Toggle navigation">
				<span  class="navbar-toggler-icon"></span>
			</button>
				<div class="collapse navbar-collapse" id="drop">
					<ul class="navbar-nav   mx-auto smooth-scroll ">

						<?php  
						$query="SELECT * FROM categories";
						$result=mysqli_query($connection,$query);
						while($row=mysqli_fetch_assoc($result)){
							$cat_title=$row['cat_title'];
							echo "<li class='nav-item' ><a href='#' class='nav-link' style='color:white'>{$cat_title}</a></li>";

						}






						 ?>
						 <!--form class="form-inline" action="/action_page.php">
    <input class="form-control ml-sm-5" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button>
  </form --->
						<li class="nav-item"><a style="color:white"class="nav-link"  href="material-dashboard-dark-edition-v2.1.0/examples/dashboard.php"><strong>Admin</strong></a></li>
						<!--li class="nav-item"><a  class="nav-link"href="#">Executives</a></li>
						<li class="nav-item"><a class="nav-link" href="#">About</a></li><li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Events</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
						<li class="nav-item"><a class="nav-link" href="#">allumni</a></li--->
					</ul>
				</div>
			
		</nav>
		
