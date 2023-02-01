<?php
$error=$_GET['error'];
if($error=="success"){
echo '<br /><a href="./index.php">Home</a>';
}
else{
echo "<script>alert('$error,Go Back');history.go(-1);</script>";
}
?>
