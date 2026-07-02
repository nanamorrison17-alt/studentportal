<?php

include("connectionDB.php");

$id = $_POST['id'];
$status = $_POST['admission_status'];

$sql = "UPDATE students SET admission_status='$status' WHERE id='$id'";
mysqli_query($conn,$sql);
header( "Location: ../view.php?id=".$id);

?>