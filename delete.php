<?php
    session_start();
    $username=$_SESSION['user'];
    $filename = $_POST['delete'];
    $dir_path = sprintf("/home/emcclanahan/CSE330_Module2_Files/%s", $username);
    $full_path = sprintf("/home/emcclanahan/CSE330_Module2_Files/%s/%s", $username, $filename);
    chdir($dir_path);
    if (unlink($full_path)) {
        echo "File Successfully Deleted!";
    }
    else {
        echo "File deletion failed. Please try again.";
        if(is_writable($filename)) {
            echo "it is writable";
        }
        else {
            echo "not writable";
        }
        echo $dir_path;
        echo $full_path;
    }
    echo '
    <form action="displayFiles.php" method="Post">
        <button type="submit">Go Back</button>
   </form>
    '; 
?>

    