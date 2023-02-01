<meta charset="utf-8">
<?php
  include_once 'includes/dbh-inc.php';
?>
<?php
if(isset($_POST['userSubmit'])){
	$userName=$_POST['userName'];
	$userPass=$_POST['userPass'];
	$sql = "select * from users where user_uid='".$userName."' 
	and password='".md5($userPass)."'";
	if($results=mysqli_query($link,$sql)){
		if(mysqli_num_rows($results)>0){
			setcookie('name',$userName,time()+3600*24,'/');
			echo "Success£¨<a href='index.php'>Go Home</a>";
		}else{
			echo "Error£¨<a href='login.php'>Try Again</a>";
		}
	}else{
		die(mysqli_error($link));
	}
}else{
	$html=<<<HTML
	<form
	method="POST"
	>
	”√ªß√˚£∫<input type="text" name="userName"><br />
	√‹¬Î£∫<input type="password" name="userPass"><br />
	<input type="submit" name="userSubmit" value="µ«¬º">
	</form>
HTML;
echo $html;
}
?>
<?php
mysqli_close($link);
?>
