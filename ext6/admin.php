<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $title=$_POST['title'];

    $f_name=$_FILES['picture']['name'];
    $f_dir='picture/'.$f_name;
    move_uploaded_file($_FILES['picture']['tmp_name'],$f_dir);

    $des=$_POST['des'];
    $aut=$_POST['aut'];
    $date=$_POST['date'];

    $sql="INSERT INTO `blog`(`title`, `picture`, `description`, `author`, `date`) VALUES ('$title','$f_name','$des','$aut','$date')";
    $res=mysqli_query($con,$sql);

    if($res){
        echo "<script>alert('Record Inserted!!')</script>";
    }
    else{
        echo "not";
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
    <h2>blog</h2>
    <form method="post" enctype="multipart/form-data">
        <table>
        <tr>
            <td>Title</td>
            <td><input type="text" id="title" name="title"></td>
        </tr>
        <tr>
            <td>Picture</td>
            <td><input type="file" id="picture" name="picture"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea id="des" name="des"></textarea></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><input type="text" id="aut" name="aut"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="date" id="date" name="date"></td>
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