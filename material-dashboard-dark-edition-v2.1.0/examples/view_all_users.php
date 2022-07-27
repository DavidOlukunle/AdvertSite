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
      <div class="sidebar-wrapper">
       <ul>
        <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>

        <li class="nav-item">
          <a class="nav-link" href="#">Users</a></li>


       
             
              <div class="dropdown">
                <button class="nav-item dropdown-toggle" type="" data-toggle="dropdown"><a href="view_all_post.php">Advert_posts</a></button> 
                <ul class="dropdown-menu">
                  <li><a href="view_all_post.php">view all post</a></li>
                  <li><a href="#">add post</a></li>
                </ul>
              </div>
            
          
          <li class="nav-item ">
            <a class="nav-link" href="categories.php">Categories</a></li>
          
        
          <li class="nav-item ">
            <a class="nav-link" href="comments.php">Comments</a>
              
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
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="">Welcome to Admin<small>author</small></h1>
            </div>
          
        
      <div class="table-responsive">
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>firstnmae</th>
      <th>lastname</th>
      <th>role</th>
      <th>username</th>
      <th>email</th>
      <th>password</th>
      
    </tr>
  </thead>
    <tbody>
      
      <?php 
      $query="SELECT * FROM user";
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

         echo "<tr>";
         echo "<td> { $user_id}</td>";
          echo "<td> {$user_firstname}</td>";
           echo "<td>{$user_lastname}</td>";
           
             echo "<td>$user_role</td>";
              echo "<td> { $username}</td>";
               echo "<td> {$user_email}</td>";
                echo "<td> {  $user_password}</td>";
                echo "<td><a href='view_all_users.php?change_to_admin= $user_id'>Admin</a></td>";
                echo "<td><a href='view_all_users.php?change_to_subscriber=$user_id'>Subscriber</a></td>";
                echo "<td><a href='view_all_users.php?delete={$user_id}'>Delete</a></td>";
                echo "<td><a href='edit_users.php?edit={$user_id}'>Edit</a></td>";
                echo "</tr>";


      }






      ?>
          

    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
</div>

<!--query for approving and unapproving posts. ie comments or peoples aplications--->
  <?php 
  if(isset($_GET['change_to_admin'])){
    $the_user_id=$_GET['change_to_admin'];
   $query="UPDATE user SET user_role='admin' WHERE user_id = $the_user_id ";
    $admin_user_id=mysqli_query($connection,$query);
    if(!$admin_user_id){
      die("QUERY FAILED".mysqli_error($connection));
    }
    header("Location:view_all_users.php");
  }

?>
<?php
  if(isset($_GET['change_to_subscriber'])){
    $the_user_id=$_GET['change_to_subscriber'];
    $query="UPDATE user SET user_role= 'subscriber' where user_id = $the_user_id   ";
    $sub_user_id=mysqli_query($connection,$query);
    if(!$sub_user_id){
      die("QUERY FAILED".mysqli_error($connection));
    }
    header("Location:view_all_users.php");
  }

?>
  <!---this code is for deleting the advert posts --->
  <?php 
  if(isset($_GET['delete'])){
    echo "hello";
    $delete=$_GET['delete'];
    $query="DELETE FROM user where user_id={$delete}";
    $result=mysqli_query($connection, $query);
    header("location:view_all_users.php");
  }
  ?>

  