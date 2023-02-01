<section class="main-container">
 <div class="main-wrapper">
   <h2>Home Page(Test by Annie Xu)</h2>
<?php
session_id("SID");
session_start();
include_once 'header.php';
//$testuser= $_COOKIE["uid"];
//echo $testuser;
$testuser=$_SESSION['u_id'];
if(isset($testuser))
{
echo $testuser;
echo ',Welcome!<br /> ';
echo '<form method="post" action="./includes/logout-inc.php">
<input type="submit" name="submit" value="Log Out">
</form>';
}
else
{
echo '<form method="post" action="./includes/login-inc.php">
<input type="text" name="uid" placeholder="Username"/><br />
<input type="password" name="pwd"  placeholder="Password"/><br />
<input type="submit" name="submit" value="Login"><br />
</form>';
}
?>

   <a href="singup.php">Sign Up</a>&nbsp;&nbsp;<br />
   <a href="calculator.php">Calculator</a>&nbsp;&nbsp;<br />
   <a href="forum.php">Forum</a>&nbsp;&nbsp;<br /><br />
   
 </div>
</section>

<?php
include_once 'footer.php';
?>