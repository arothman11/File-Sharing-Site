<?php
    session_start();
    $username=$_SESSION['user'];
    $filename = $_POST['delete'];
    $dir_path = sprintf("/home/emcclanahan/CSE330_Module2_Files/%s", $username); //path to the directory
    $full_path = sprintf("/home/emcclanahan/CSE330_Module2_Files/%s/%s", $username, $filename); //path to the file
    chdir($dir_path);
    if (unlink($full_path)) { //delete the file
        echo "File Successfully Deleted!";
    }
    else { //if it fails
        echo "File deletion failed. Please try again.";
    }
    echo '
    <form action="displayFiles.php" method="Post">
        <button type="submit">Go Back</button>
    </form>
    '; 
?>

    