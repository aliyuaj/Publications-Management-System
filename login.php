<?php session_start(); ob_start();
require'includes/conn.php';
if(isset($_POST['username']) && isset($_POST['password'])){
    $uname=trim($_POST['username']);
    $pword=trim($_POST['password']);
    if(strlen($pword)>0 && strlen($uname)>0){
        $query1="SELECT * FROM users WHERE email='$uname'  && password='$pword'";
        $sql=mysqli_query($con,$query1)	;
        if(mysqli_num_rows($sql)==1){
            $user = mysqli_fetch_assoc($sql);
            if($user['suspended']=='0'){
                if($user['usertype']=='admin'){
                    $_SESSION['log_group'] = 'admin';
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['name'] = $user['fullName'];
                    $_SESSION['type'] = $user['type'];
                    header('location:admin');
                }else{
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['name'] = $user['fullName'];
                    header('location:index.php');
                }
            }
            else{
                $_SESSION['login']="Sorry, your account has been suspended. Please contact the admin.";
                header('location:user_login.php');
            }
        }
        else{
            $_SESSION['login']="Invalid username or password";
            header('location:user_login.php');
        }
    }else{
        $_SESSION['login']="Enter username and password";
        header('location:user_login.php');
    }
} else{
    header('location:index.php');
}
?>