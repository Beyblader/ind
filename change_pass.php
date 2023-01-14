<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>CHANGE PASSWORD</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="change-p.php" method="post">
     	<h2>CHANGE PASSWORD</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Old Password</label>
     	<input type="password" name="password" placeholder="Old Password"><br>

     	<label>New Password</label>
     	<input type="new-password" name="new-password" placeholder="New Password"><br>

          <label>Confirm New Password</label>
     	<input type="c-new-password" name="c-new-password" placeholder="Confirm New Password"><br>

     	<button type="submit">Change Password</button>
		 <a href="home.php" class="ca">Home</a>
        
     </form>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>