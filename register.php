<!DOCTYPE html>
<html>

<head>
    <title>REGISTER</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form action="register-check.php" method="post">
        <h2>REGISTER</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <label>Name</label>
        <input type="text" name="name" placeholder="Name"><br>

        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <label>Re_Password</label>
        <input type="password" name="re_password" placeholder="Re_Password"><br>

        <button type="submit">Register</button>
        <a href="login.php" class="ca">Login Now</a>
    </form>
</body>

</html>