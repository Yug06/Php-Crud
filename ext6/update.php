<?php
include 'connect.php';

if(isset($_REQUEST['updateid'])){
    $id=$_REQUEST['updateid'];
    $sql="select * from blog where id='$id'";
    $res=mysqli_query($con,$sql);
    if($res){
        while($r=mysqli_fetch_assoc($res)){
            $id=$r['id'];
            $title=$r['title'];
            $picture=$r['picture'];
            $des=$r['description'];
            $aut=$r['author'];
            $date=$r['date'];
            

        }
    }
}

if(isset($_POST['submit'])){
    $title=$_POST['title'];

    $f_name=$_FILES['picture']['name'];
    $f_dir='picture/'.$f_name;
    move_uploaded_file($_FILES['picture']['tmp_name'],$f_dir);

    $des=$_POST['des'];
    $aut=$_POST['aut'];
    $date=$_POST['date'];

    $sql="UPDATE `blog` SET `title`='$title',`picture`='$f_name',`description`='$des',`author`='$aut',`date`='$date' WHERE id='$id'";
    $res=mysqli_query($con,$sql);

    if($res){
       header('Location:display.php');
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
            <td><input type="text" id="title" name="title" value=<?php echo $title ?>></td>
        </tr>
        <tr>
            <td>Picture</td>
            <td><input type="file" id="picture" name="picture" value=<?php echo $picture;?>></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea id="des" name="des" value=<?php echo $des;?>></textarea></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><input type="text" id="aut" name="aut" value=<?php echo $aut;?>></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="date" id="date" name="date" value=<?php echo $date;?>></td>
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