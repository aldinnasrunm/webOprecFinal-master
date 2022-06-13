<?php
//upload but not in databse

session_start();
require '../dbconnect.php';


if(isset($_POST['submitUpload'])){
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    // print_r($file);
    if($file['error'] == 0){
        if($file['size'] <= 1000000){
            $file_ext = explode('.', $filename);
            $file_ext = strtolower(end($file_ext));
            $allowed = array('jpg');
            if(in_array($file_ext, $allowed)){
                $new_name = 'profile'.$_SESSION['id']. '.' . $file_ext;
                $destination = '../uploads/' . $new_name;
                $uploaded = move_uploaded_file($file['tmp_name'], $destination);
                if($uploaded){
                    $updateStatus = mysqli_query($conn, 'UPDATE profileImg SET status=1 WHERE userid = '.$_SESSION['id'].';');
                    header("Location: pages-profile.php?upload=succes");
                    echo 'File uploaded successfully';
    
                }else{
                    echo '<script> alert("upload failed");</script>';
                }
                            }else{
                echo 'File type not allowed';
            }
        }
    }else{
        echo "Error: ".$file['error'];
        }
    }




?>