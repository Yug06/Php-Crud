<?php
include "conn.php";
?>
<?php
$r = array(null, null, null);
if (isset($_POST['submit'])) {
    $ename = $_POST['ename'];


    $f_name = $_FILES['photo']['name'];
    $f_dir = "empimg/" . $f_name;
    move_uploaded_file($_FILES['photo']['tmp_name'], $f_dir);

    $deg = $_POST['edeg'];
    $city = $_POST['city'];

    $sql = "INSERT INTO `employee`( `empname`, `empimage`, `empdeg`, `city`) VALUES ('$ename','$f_name','$deg','$city')";
    $result = mysqli_query($conn, $sql) or die($sql);
}

//delete

if (isset($_GET['del_id'])) {
    $eid = $_GET['del_id'];
    $sql = "DELETE FROM `employee` WHERE `empid`='$eid'";
    $result = mysqli_query($conn, $sql);
}

//update
if (isset($_GET['upd_id'])) {
    $eid = $_GET['upd_id'];

    $sql = "SELECT * FROM `employee` WHERE `empid`='$eid'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    $r[0] = $data['empname'];
    $r[1] = $data['empdeg'];
    $r[2] = $data['city'];
}
if (isset($_POST['update'])) {
    $eid = $_GET['upd_id'];
    $ename = $_POST['ename'];
    $deg = $_POST['edeg'];
    $city = $_POST['city'];

    $sql = "UPDATE `employee` SET `empname`='$ename',`empdeg`='$deg',`city`='$city' WHERE `empid`='$eid'";
    $result = mysqli_query($conn, $sql) or die($sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        EMP NAME:<input type="text" name="ename" placeholder="emp name" value="<?php echo $r[0]; ?>"></br>
        EMP IMAGE:<input type="file" name="photo"></br>
        EMP degree:<input type="text" name="edeg" placeholder="emp degree" value="<?php echo $r[1]; ?>"></br>
        city:
        <select name="city">
            <?php
            $sql = "SELECT * FROM `citytb` ";
            $result = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($result)) {
            ?>
            <option value="<?php echo $data[1];  ?>" <?php if ($data[1] == $r[2]) {
                                                                echo "selected";
                                                            } ?>><?php echo $data[1]; ?></option>
            <?php } ?>
        </select></br>
        <input type="submit" name="submit" value="submit">
        <input type="submit" name="update" value="update">

    </form>
    <table border="4">
        <tr>
            <th>EMP NAME</th>
            <th>EMP IMAGE</th>
            <th>EMP degree</th>
            <th>EMP city</th>
            <th>delete</th>
            <th>update</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `employee` ";
        $result = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td>
                <?php echo $data['empname']; ?>
            </td>
            <td>
                <img src="./empimg/<?php echo $data['empimage']; ?>" alt="empimage" style width="100">
            </td>
            <td>
                <?php echo  $data['empdeg']; ?>
            </td>
            <td>
                <?php echo $data['city']; ?>
            </td>
            <td><a href="employee.php?del_id=<?php echo $data['empid']; ?>">delete</td>
            <td><a href="employee.php?upd_id=<?php echo $data['empid']; ?>">update</td>
        </tr>
        <?php } ?>
    </table>
</body>

</html>