<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h1><a href='forum.php'>Forum</a></h1>
<?php
session_id("SID");
session_start();
include "includes/dbh-inc.php";
?>
<?php
$testuser=$_SESSION['u_id'];
if(isset($testuser))
{
echo $testuser;
echo ',Welcome!<br /> ';
	$html =<<<HTML
	<form
	method="post"
	>
	Title:<br /><input type="text" name="userTitle"><br />
	Content:<br />
	<textarea name="userCont"></textarea><br />
	<input type="submit" name="userSubmit" value="Submit">
	</form>
HTML;
	echo $html."<br />";
	if(isset($_POST['userSubmit']) && isset($_POST['userTitle'])){
		$userName=$testuser;
		$title = $_POST['userTitle'];
		$cont = $_POST['userCont'];
		$sql = "INSERT INTO `messages`(`uname`, `title`, `content`) VALUES ('".$userName."',
		'".$title."','".$cont."')";
		if($results = mysqli_query($conn,$sql)){
			echo "Success,<a href='forum.php'>Go Back</a>";
		}else{
			mysqli_close($conn);
		}
	}else{
		echo "Please Submit";
	}
}else{
	echo "<a href='login.php'>Login</a>";
}
?>
<?php
mysqli_close($conn);
?>
</body>
</html>
