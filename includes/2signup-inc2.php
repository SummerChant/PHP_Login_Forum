<?php
  if(isset($_POST['submit']))
  { 
  include_once 'dbh-inc.php';
  $first=$_POST['first']);
  $last=$_POST['last']);
  $email=$_POST['email']);
  $uid=$_POST['uid']);
  $pwd=$_POST['pwd']);

  //error handlers
  // check for any empty inputs.
  if (empty($uid) || empty($email) || empty($pwd) || empty($first)|| empty($last)) {
    header("Location: error.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }
  // check for an invalid username AND invalid e-mail.
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $uid) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: error.php?error=invaliduidmail");
    exit();
  }
  // check for an invalid username. In this case ONLY letters and numbers.
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
    header("Location: error.php?error=invaliduid&mail=".$email);
    exit();
  }
  // check for an invalid e-mail.
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: error.php?error=invalidmail&uid=".$uid);
    exit();
  }

	  else {
	
		// include another error handler here that checks whether or the username is already taken. We HAVE to do this using prepared statements because it is safer!
	
		$sql = "SELECT * FROM users WHERE uid='$uid'";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
		  header("Location: error.php?error=sqlerror");
		  exit();
		 }
		else {
		  mysqli_stmt_bind_param($stmt, "s", $uid);
		  mysqli_stmt_execute($stmt);
		  mysqli_stmt_store_result($stmt);
		  $resultCount = mysqli_stmt_num_rows($stmt);
		  mysqli_stmt_close($stmt);
		  if ($resultCount > 0) {
			header("Location: error.php?error=usertaken&mail=".$email);
			exit();
		  }
		  else {
			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd) VALUES ('$first','$last','$email','$uid','$hashedPwd');";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: error.php?error=sqlerror");
			  exit();
			}
			else {
			  mysqli_stmt_bind_param($stmt, "sss", $uid, $email, $hashedPwd);
			  mysqli_stmt_execute($stmt);
			  header("Location: error.php?error=success");
			  exit();
			}
		  }
		}
	  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  }
  else{
    header("Location: error.php?error=no");
	exit();
  }
  