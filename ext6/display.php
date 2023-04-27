<?php
include 'connect.php';
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
    <table width="100%" border="1">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Picture</th>
            <th>Description</th>
            <th>Author</th>
            <th>Date</th>
            <th>Operations</th>
        </tr>
        <?php
        
        $sql="select * from blog";
        $res=mysqli_query($con,$sql);
        if($res){
            while($r=mysqli_fetch_assoc($res)){
                $id=$r['id'];
                $title=$r['title'];
                $picture=$r['picture'];
                $des=$r['description'];
                $aut=$r['author'];
                $date=$r['date'];

                echo '<tr>
                <td>'.$id.'</td>
                <td>'.$title.'</td>
                <td><img width="150px" height="100px" src=picture/'.$picture.'></td>
                <td>'.$des.'</td>
                <td>'.$aut.'</td>
                <td>'.$date.'</td>

                <td><a href=update.php?updateid='.$id.'><input type="button" name="update" value="update"></a>
                <a href=delete.php?deleteid='.$id.'><input type="button" name="delete" value="delete"></a>
                </td>

                </tr>';
            }
        }
        
        ?>
    </table>
</body>
</html>