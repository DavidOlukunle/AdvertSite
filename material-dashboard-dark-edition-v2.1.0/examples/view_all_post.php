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
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>

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
          
        
      <div class="col_sm_8">
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>advert_id</th>
      <th>advert_title</th>
      <th>advert_date</th>
      <th>advert_image</th>
      <th>advert_author</th>
      <th>advert_content</th>
      <th>advert_contacts</th>
       <th>advert_comment</th>
      <th>advert_tags</th>
      <th>advert_status</th>
      <th>Delete</th>
      <th>Edit</th>
      <th>Publish</th>
    </tr>
  </thead>
    <tbody>
      
      <?php 
      $query="SELECT * FROM advert_posts";
      $result= mysqli_query($connection,$query);
      while($row=mysqli_fetch_assoc($result)){
        $advert_id=$row['advert_id'];
        $advert_title=$row['advert_title'];
        $advert_date=$row['advert_date'];
        $advert_image=$row['advert_image'];
        $advert_author=$row['advert_author'];
        $advert_content=$row['advert_content'];
        $advert_contact=$row['advert_contact'];
        $advert_tags=$row['advert_tags'];
        $advert_status=$row['advert_status'];

         echo "<tr>";
         echo "<td> { $advert_id}</td>";
          echo "<td> {$advert_title}</td>";
           echo "<td>{$advert_date}</td>";
            echo "<td><img width='100' src='images/$advert_image'></td>";
             echo "<td> {'$advert_author'}</td>";
              echo "<td> { $advert_content}</td>";
               echo "<td> {$advert_contact}</td>";
              





  $the_query="SELECT * from comment where comment_post_id=$advert_id  ";
  $to_get=mysqli_query($connection,$the_query);
 
  $count=mysqli_num_rows($to_get);

               echo"<td>$count</td>";

             echo "<td> { $advert_tags}</td>";
             echo"<td>$advert_status</td>";
                echo "<td><a href='view_all_post.php?delete={$advert_id}'>Delete</td>";
                echo "<td><a href='edit_posts.php?edit={$advert_id}'>Edit</td>";
                echo "<td><a href='view_all_post.php?publish={$advert_id}'>publish</td>";
                echo "</tr>";
              }


?>


 
        <td>12</td>
        <td>Chin-chin</td>
        <td>date</td>
        <td>image</td>
        <td>DAvid</td>
        <td> content</td>
        <td>contacts</td>
        <td>tags</td>
      

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
  if(isset($_GET['delete'])){
    echo "hello";
    $delete=$_GET['delete'];
    $query="DELETE FROM advert_posts where advert_id={$delete}";
    $result=mysqli_query($connection, $query);
    header("location:view_all_post.php");
  }
  ?>
  <?php
  if(isset($_GET['publish'])){
    $publish=$_GET['publish'];
    $query="UPDATE advert_posts SET advert_status='published' where advert_id=$publish";
    $result=mysqli_query($connection,$query);
    header("Location:view_all_post.php"); 
  }