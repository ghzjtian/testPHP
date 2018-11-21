<?php

//echo $_POST['myfile'];
//echo $_FILES["myfile"]["name"].'<hr/>';

$upload_path = $_SERVER['DOCUMENT_ROOT']."/file_upload/upload/";
$dest_file = $upload_path.basename($_FILES['myfile']['name']);

if(move_uploaded_file($_FILES['myfile']['tmp_name'],$dest_file)){
    echo "Good,File upload to  `file_upload/upload` directory.";
}else{
    echo "Upload error!".$_FILES['myfile']['error'];
}
?>
