<?php
  include_once 'dbh-inc.php';
  
  $first=$_POST['first']; 
  $last=$_POST['last'];
  $uid=$_POST['uid'];
  $pwd=$_POST['pwd'];
  $email=$_POST['email'];
  
  //error handlers
  // check for any empty inputs.
  if (empty($uid) || empty($email) || empty($pwd) || empty($first)|| empty($last)) {
    header("Location: error.php?error=emptyfields");
    exit();
  }
  // check for an invalid username AND invalid e-mail.
  else
  {
  // include another error handler here that checks whether or the username is already taken. We HAVE to do this using prepared statements because it is safer!
	
		$sql = "SELECT * FROM users WHERE user_uid='$uid'";
		$result = mysqli_query($conn,$sql);
		$resultcheck=mysqli_num_rows($result);
		if ($resultcheck>0) {
		  header("Location: error.php?error=usertaken");
		  exit();
		 }
		else {
		    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd) VALUES ('$first','$last','$email','$uid','$hashedPwd');";
			mysqli_query($conn,$sql);
			
			header("Location: error.php?error=success");
		    exit();
		}
  }

?>
  