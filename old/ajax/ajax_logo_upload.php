<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 1/3/2018
 * Time: 7:16 PM
 */

if(isset($_FILES["logoimagefile"]["type"]))
{
    $validextensions = array("jpeg", "jpg", "png", "JPG", "PNG");
    $temporary = explode(".", $_FILES["logoimagefile"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["logoimagefile"]["type"] == "image/png") || ($_FILES["logoimagefile"]["type"] == "image/jpg") || ($_FILES["logoimagefile"]["type"] == "image/jpeg")
        ) && ($_FILES["logoimagefile"]["size"] < 100000000)//Approx. 100kb files can be uploaded.
        && in_array($file_extension, $validextensions)) {
        if ($_FILES["logoimagefile"]["error"] > 0)
        {
            echo json_encode(array('success' => '0', 'msg' => $_FILES["logoimagefile"]["error"]));
        }
        else
        {
            $sourcePath = $_FILES['logoimagefile']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "../assets/uploads/profile/";//.$_FILES['logoimagefile']['name']; // Target path where
            $ext = pathinfo($_FILES['logoimagefile']['name'], PATHINFO_EXTENSION);
            $dest_filename = md5(uniqid(rand(),true)).'.'.$ext;
            move_uploaded_file($sourcePath,$targetPath.$dest_filename) ; // Moving Uploaded file
            echo json_encode(array(
                'success' => '1',
                'msg'     => "<span id='success'>Uploaded Successfully</span><br/>",
                'name'    => $dest_filename));
        }
    }
    else
    {
        echo json_encode(array('success' => '0', 'msg' => "<span id='invalid'>***Invalid file Size or Type***<span>"));
    }
}
?>