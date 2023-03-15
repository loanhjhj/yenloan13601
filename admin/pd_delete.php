<?php
include_once('../partials/connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM products WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Xoá thành công!";
} 
header('location: index.php');

exit();
}
?>