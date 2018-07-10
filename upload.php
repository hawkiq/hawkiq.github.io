<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 10/07/2018
 * Time: 09:07 م
 * IQ TECH Tutorials
 * Project : myup
 * upload.php
 */
if (isset($_POST['title'])){
    $error = false;
    $err_msg ='';
    $upload_dir = "uploads/";

    $title = ($_POST['title']);

    if ($title == ""){
        $error = true;
        $err_msg = 'Title is Empty';
    }

    if (isset($_FILES["file"]["name"])){
        $ep_file_tmp = $_FILES["file"]["tmp_name"];
        $ep_file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $Extensions = array (
            "mp4","jpg","bmp"
        );

        if ((!in_array(strtolower($ep_file_ext) , $Extensions )) ){
            $error = true;
            $err_msg =  'Wrong extension for File';
        }
    }else{
        $error = true;
        $err_msg = 'Forget to choose file';
    }


    if ($error == false){
        $fileName = time().".".$ep_file_ext;
        move_uploaded_file($ep_file_tmp, $upload_dir.''.$fileName);
        echo '<div class="alert alert-success" role="alert">
Upload Success
</div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">
 '.$err_msg.'
</div>';
    }

}else{
    echo 'fuck';
}