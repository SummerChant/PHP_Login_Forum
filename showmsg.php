<?php
include "includes/dbh-inc.php";
include "header.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "select * from messages where id =".$id;
	//echo $sql;
	if($results = mysqli_query($conn,$sql)){
		$result=mysqli_fetch_assoc($results);
		echo $result['uname'].":".$result['title']."<hr />";
		echo $result['content'];
		
	}else{
		echo mysqli_error($conn);
	}
}else{
	echo "id Error!";
}
mysqli_close($conn);
include "footer.php";
?>
