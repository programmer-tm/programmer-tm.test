<?php
if ($_FILES && $_FILES["userfile"]["error"]== UPLOAD_ERR_OK)
{
    $avatar = $_FILES["userfile"]["name"];
    move_uploaded_file($_FILES["userfile"]["tmp_name"], 'img/'. $avatar);
}
include '../router/router.php';
?>