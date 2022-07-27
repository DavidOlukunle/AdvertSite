<?php include "db.php"; 
SESSION_START();

if(isset($_POST['login'])){
	 $username= $_POST['username'] ;
	 $password = $_POST['password'];
	 
	 


$username=mysqli_real_escape_string($connection,$username);
$password=mysqli_real_escape_string($connection,$password);

$query="SELECT * FROM user where user_password='{$password}'  ";
$query.="AND username ='{$username}'"; 


$result=mysqli_query($connection,$query);
if(!$result){
	die('QUERY FAILED'.mysqli_error($connection));
}



while($row=mysqli_fetch_array($result)){
 $db_id=$row['user_id'];
$db_username=$row['username'];
$db_password=$row['user_password'];
$db_firstname=$row['user_firstname'];
$db_lastname=$row['user_lastname'];
$db_role=$row['user_role']; 
}

if($username !== $db_username && $password !== $db_password){
	header("Location:/advertwebsite/");

}
//else if($username == $db_username && $password == $db_password) {
	//header("Location:/advertwebsite/material-dashboard-dark-edition-v2.1.0/examples/dashboard.php");

	
//}
else{
	header("Location:/advertwebsite/material-dashboard-dark-edition-v2.1.0/examples/dashboard.php");
	$_SESSION['username']=$db_username;
	$_SESSION['user_role']=$db_role;
}

}

