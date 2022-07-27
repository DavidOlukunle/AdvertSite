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
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="">Welcome to Admin<small>author</small></h1>
            </div>
          
        
      <div class="col_sm_8">
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>id</th>
      <th>Author</th>
      <th>comment</th>
      <th>email</th>
      <th>status</th>
      <th>in response to</th>
      <th>date</th>
      <th>approve</th>
      <th>unapprove</th>
      <th>delete</th>

    </tr>
  </thead>
    <tbody>
      
      <?php 
      $query="SELECT * FROM comment";
      $result= mysqli_query($connection,$query);
      while($row=mysqli_fetch_assoc($result)){
        $comment_id=$row['comment_id'];
        $comment_post_id=$row['comment_post_id'];
        $comment_author=$row['comment_author'];
        $comment_content=$row['comment_content'];
        $comment_email=$row['comment_email'];
        $comment_status=$row['comment_status'];
        $comment_date=$row['comment_date'];
       

         echo "<tr>";
         echo "<td> { $comment_id}</td>";
          echo "<td> { $comment_author}</td>";
           echo "<td>{$comment_content}</td>";
           echo "<td>{$comment_email}</td>";
           
             echo "<td> {$comment_status}</td>";
$query="SELECT * FROM advert_posts where advert_id= $comment_post_id ";
$the_result=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($the_result)){
  $advert_id=$row['advert_id'];
  $advert_title=$row['advert_title'];
    echo "<td><a style='text-decoration:underline' href='/advertwebsite/individualpost.php?p_id=$advert_id'>{$advert_title}</a></td>";
}
            

  

              


             




            
              echo "<td> { $comment_date}</td>";

              echo "<td><a href='comments.php?approve= $comment_id'>Approve</td>";
              echo "<td><a href='comments.php?unapprove= $comment_id'>Unapprove</td>";
              
                echo "<td><a href='comments.php?delete=$comment_id'>Delete</td>";
                
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

  <!---this code is for deleting the advert posts --->
  <?php 
    if(isset($_GET['approve'])){
    $approve=$_GET['approve'];
    $query="UPDATE comment SET comment_status='approved' WHERE comment_id=$approve ";
    $result=mysqli_query($connection, $query);
    header("location:comments.php");
  }


 if(isset($_GET['unapprove'])){
    $unapprove=$_GET['unapprove'];
    $query="UPDATE comment SET comment_status='unapproved' WHERE comment_id= $unapprove ";
    $result=mysqli_query($connection, $query);
    header("location:comments.php");
  }







  if(isset($_GET['delete'])){
    echo "hello";
    $delete=$_GET['delete'];
    $query="DELETE FROM comment where comment_id={$delete}";
    $result=mysqli_query($connection, $query);
    header("location:comments.php");
  }
  ?>
