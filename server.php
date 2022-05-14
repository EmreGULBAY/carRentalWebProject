<?php
session_start();
$username = "";
$email    = "";
$phone ="";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'web');
if (isset($_POST['save'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db,$_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password2']);
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
    if (empty($phone)) { array_push($errors, "Phone number is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' OR phone='$phone' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
    if($user['phone']===$phone){
        array_push($errors, "phone number already exists");
    }
  }
  if (count($errors) == 0) {
  	$password = md5($password_1);
  	$query = "INSERT INTO users (username, email, password,phone) 
  			  VALUES('$username', '$email', '$password','$phone')";
      mysqli_query($db, $query);
      $id= "SELECT id FROM users WHERE username='$username'";
      $result2=mysqli_query($db,$id);
      $result3=mysqli_fetch_assoc($result2);
      $userID=$result3['id'];
      $query2 = "INSERT INTO userWallet (id,amount)
                    VALUES($userID,0)";
      mysqli_query($db,$query2);
  	header('location: firstLogin.php');
  }
}
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$query2 = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
	$results2 = mysqli_query($db, $query2);
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $_SESSION['username']=$username;
	if(mysqli_num_rows($results2) == 1) {
  	  header('location: adminPage.php');}
  	 else if (mysqli_num_rows($results) == 1) {

  	  header('location: userMainPage.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>