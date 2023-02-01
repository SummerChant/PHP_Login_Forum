<?php
include "includes/dbh-inc.php";
include "header.php";
?>
<h2>Forum </h2>
<?php
session_id("SID");
session_start();
$testuser=$_SESSION['u_id'];
if(isset($testuser))
{
echo "Welcome! ";
echo $_SESSION['u_id'];

echo '<br /><form method="post" action="includes/logout-inc.php">
<input type="submit" name="submit" value="Log Out">
</form><br />';
echo "<a href='addCont.php'>  Post New </a><br />";
}
else
{
echo '<form method="post" action="includes/login-inc.php">
<input type="text" name="uid" placeholder="Username"/><br />
<input type="password" name="pwd"  placeholder="Password"/><br />
<input type="submit" name="submit" value="Login"><br />
</form>';
}
?>

<?php
echo "<hr />";
$sql="select * from messages";
if($results=mysqli_query($conn,$sql)){
	if(mysqli_num_rows($results)>0){
		echo "<table border = 2>";
		echo "<tr><td>ID</td><td>TITLE</td><td>AUTHOR</td></tr>";
		while($result=mysqli_fetch_assoc($results)){
			//var_dump($result);
			echo "<tr><td>{$result['id']}</td><td><a href='showmsg.php?id=
			{$result['id']}' target='_blank'>
			{$result['title']}</a></td><td>{$result['uname']}</td></tr>";
		}
		echo "</table>";
	}else{
		echo "No Post";
	}
}else{
	echo mysqli_error($conn);
}

mysqli_close($conn);
include "footer.php";
?>
