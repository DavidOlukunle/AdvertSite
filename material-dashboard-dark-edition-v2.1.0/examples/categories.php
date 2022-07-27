<?php include "header.php" ?>



  <div class="wrapper ">
   
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          ADVERT.COM
        </a></div>
      <div class="sidebar-wrapper"style="color:red">
        <ul>
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>

        <li class="nav-item">
          <a class="nav-link" href="user.php">Users</a></li>


       
              <div class="dropdown">
                <button class="nav-item dropdown-toggle" type="" data-toggle="dropdown"><a href="view_all_post.php">Advert_posts</a></button> 
                <ul class="dropdown-menu">
                  <li><a href="view_all_post.php">view all post</a></li>
                  <li><a href="add_posts.php">add post</a></li>
                </ul>
              </div>
            
          
          <li class="nav-item ">
            <a class="nav-link" href="categories.php">Categories</a></li>
          
        
          <li class="nav-item ">
            <a class="nav-link" href="#">Comments</a>
              
          </li>
         <li class="nav-item"><a class="nav-link"href="#">hello</a></li>
          
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">Profile</i>
              <p></p>
            </a>
          </li>
         
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
   <div class="main-panel">
      <!-- Navbar -->
      <?php include "navbar.php" ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
            	<h1 class="">Welcome to Admin<small><?php echo $_SESSION['username'] ?></small></h1>
            </div>
            	<div class="col-sm-6">
            		<?php if(isset($_POST['submit'])){
            			$cat_title=$_POST['cat_title'];
            			if ($cat_title == "" || empty($cat_title)){
            				echo "<b style='color:red'> THIS FIELD CANNOT BE EMPTY </b>";

            			} 
            			else{
            			$query= "INSERT INTO categories(cat_title) ";
            			$query .= "VALUE('{$cat_title}') ";
            			$result=mysqli_query($connection,$query);
            			if(!$result){
            				die('QUERY FAILED' .MYSQLI_ERROR($CONNECTION));
            			}
            		}
            		}

            		?> 

            <form action="" method="post">
            	<div class="form-group">
            		<label for="cat_title">category Title</label>
            		<input type="text"  class="form-control" name="cat_title"></div>
            		<div class="form-group">
            			<input type="submit" class="btn btn-primary" value="add_category"name="submit"></div>
            		</form>
            	</div>
            	<div class="col-sm-6">

	<?php 
$query="SELECT * FROM categories";
$result_category=mysqli_query($connection,$query);

?>

            		<table class="table table-bordered table-hover">
            			<thead class="text-warning">
            				<tr>
            					<th>Id</th>
            					<th>cat_title</th>

            				</tr>

            			</thead>
            			<tbody>
            				
            					
            				
            				<?php
								while($row=mysqli_fetch_assoc($result_category)){
	$cat_id= $row['cat_id'];
	$cat_title= $row['cat_title'];
    echo "<tr>";
	echo "<td> {$cat_id}</td>";
	echo "<td> {$cat_title}</td>";
  echo "<td><a href='categories.php?delete={$cat_id}'>Delete</td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</td>";
	echo "</tr>";


						}


								?>
              </tbody>
                <!--code for the deleting of categories -->
                <?php
                if(isset($_GET['delete'])){
                  $delete=$_GET['delete'];
                  $query="DELETE FROM categories WHERE cat_id = {$delete} ";
                  $result=mysqli_query($connection,$query);
                header("Location:/advertwebsite/material-dashboard-dark-edition-v2.1.0/examples/categories.php");
                                 } 

                ?>
                <!---end of deleting catergories code -->


            		
            		</table>

                

            </div>
            <div class="col-sm-6">
               <form action="" method="post">
              <div class="form-group">




                <label for="cat_title"><b><h3> Edit category</h3></b></label>

                <!--- code for editing the categories --->
                <?php 
                  if(isset($_GET['edit'])){
                    $edit=$_GET['edit'];
                  



$query="SELECT * FROM categories WHERE cat_id=$edit ";
$result_category_edit=mysqli_query($connection,$query);
  while($row=mysqli_fetch_assoc($result_category_edit)){
  $cat_id= $row['cat_id'];
  $cat_title= $row['cat_title'];
  ?>


 <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text"  class="form-control" name="cat_title">
<?php }}?> 

  <!--end of code for editing categories-->

  <!----code for updating category --->
<!---after editing the categories,the data is displayed on each field of the category.So we update it finally using the below codes....this simply means after exiting ,updating is necessary --->

<?php
if (ISSET($GET_["edit"])){
  $cat_id=$GET_['edit'];
}



 if(ISSET($_POST['update_category'])){
 $update=$_POST['cat_title'];
 $query="UPDATE categories SET cat_title = '{$update}' WHERE cat_id= {$cat_id} ";
 $result=mysqli_query($connection,$query);
 if(!$result){
  die("QUERY FAILED" .  mysqli_error($connection));
 }


}



   ?>
                  <input type="submit" class="btn btn-primary" value="add_category" name="update_category"></div>
                </form>
        </d iv>
    </div>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-3  col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
      <i class="fa fa-file-facebook fa-5x"></i>
    </div>
  </div>
  
