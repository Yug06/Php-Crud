<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];

    $sql="select * from login where username='$uname' and password='$pass'";
    $res=mysqli_query($con,$sql);
    $r=mysqli_fetch_assoc($res);
    if(empty($uname)){
        echo "<script>alert('Username Required!!')</script>";
    }else if(empty($pass)){
        echo "<script>alert('Password Required!!')</script>";
    }else if($uname=="admin" && $pass=="admin"){
        header('location:admin.php');
    }else if($r){
        session_start();
        $_SESSION['uname']=$r['username'];
        $_SESSION['pass']=$r['password'];
        print_r($_SESSION);
        //header('location:client.php');
    }else{
        echo "<script>alert('Wrong Credentials!!')</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <h2>login</h2>
    <form method="post">
        <table>
        <tr>
            <td>Username</td>
            <td><input type="text" id="uname" name="uname"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" id="pass" name="pass"></td>
        </tr>
        <tr>
            <td><input type="submit" id="submit" name="submit"></td>
            <td><input type="reset" id="reset" name="reset"></td>
        </tr>
        </table>
    </form>
</center>
</body>
</html>