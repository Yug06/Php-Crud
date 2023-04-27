<?php
include 'connect.php';

if(isset($_REQUEST['deleteid'])){
    $id=$_REQUEST['deleteid'];
    $sql="delete from blog where id='$id'";
    $res=mysqli_query($con,$sql);
    if($res){
        header('Location:display.php');
    }
    else{
        echo "no";
    }
}
?>