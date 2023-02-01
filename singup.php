<?php
include_once 'header.php';
?>

<section class="main-container">
 <div class="main-wrapper">
   <h2>Sign Up - Test by Annie Xu</h2>
   <form class="signup-form" action="includes/signup-inc.php" action="POST" method="post">
     <input type="text" name="first" placeholder="First Name"> <br />
	 <input type="text" name="last" placeholder="Last Name"><br />
	 <input type="text" name="email" placeholder="Email"><br />
	 <input type="text" name="uid" placeholder="User Name"><br />
	 <input type="password" name="pwd" placeholder="Password"><br />
	 <input type="submit" name="submit" value="Sign Up">
   </form>
 </div>
</section>



<?php
include_once 'footer.php';
?>