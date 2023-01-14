<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])){

    include "db_conn.php";

    if (
        isset($_POST['password']) && isset($_POST['new-password'])
        && isset($_POST['c-new-password'])
    ) {
    
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $password = validate($_POST['password']);
        $new_password = validate($_POST['new-password']);
        $c_newpassword = validate($_POST['c-new-password']);
            
       if(empty($password)){
        header("Location: change_pass.php?error=Old Password is required");
        exit();
       }elseif(empty($new_password)){
        header("Location: change_pass.php?error=New Password is required");
        exit();
       }elseif(empty($new_password !== $c_newpassword)){
        header("Location: change_pass.php?error=The confirmation password does not match");
        exit();
       }else{
           $password = md5($password);
           $new_password = md5($new_password);
           $id = $_SESSION['id'];

           $sql = "SELECT password FROM users WHERE id='$id'AND password='$password'";

           $result = mysqli_query($conn, $sql);
           if(mysqli_num_rows($result) === 1){
            $sql = "UPDATE users set password='$new_password' WHERE id='$id'";

            mysqli_query($conn, $sql);
            header("Location: change_pass.php?success=Your password has been changed successfully");
            exit();
           }else{
            header("Location: change_pass.php?error=Incorrect password");
            exit();
           }

       }

    }else {
    header("Location: change_pass.php");
    exit();
    }
}else{
     header("Location: index.php");
     exit();
}

?>