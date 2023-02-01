 <?php
 session_id("SID");
   session_start();
  include "dbh-inc.php";
    $uid=$_POST['uid'];
	$pwd=$_POST['pwd'];  
	//error handlers
  // check for any empty inputs.
  if (empty($uid) || empty($pwd)) {
    header("Location: error.php?error=emptyfield");
    exit();
  }
  else{
  $sql = "SELECT * FROM users WHERE user_uid='$uid'";
    $result=mysqli_query($conn,$sql);
	$resultCount = mysqli_num_rows($result);
	
	  if ($resultCount<1) {
			header("Location: error.php?error=usertaken");
			exit();
		  }
	  else{
		    $row=mysqli_fetch_assoc($result);	
			
				  //dehash
			
		    $hashcheck=password_verify($pwd,$row['user_pwd']);
		    
			  if($hashcheck==false){
			
			  header("Location: error.php?error=errorpwd");
			  exit(); 
			  }
			  else
			  { 
				  $_SESSION['u_id']=$row['user_uid'];
				  $_SESSION['u_first']=$row['user_first'];
				  $_SESSION['u_last']=$row['user_last'];
				  $testuser= $_SESSION['u_id'];
				  setcookie("uid", $testuser,time()+3600,"/");
				  echo "<script>alert('Welcome!$testuser');history.go(-1);</script>";		 
				  
			  }
	     
	}
 }
?>
		  
  
	