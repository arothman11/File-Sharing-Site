<?php
session_start();

// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
    echo $filename;
	exit;
}

// Get the username and make sure it is valid
$username = $_SESSION['user'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo "Invalid username";
	exit;
}

$full_path = sprintf("/home/emcclanahan/CSE330_Module2_Files/%s/%s", $username, $filename);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	echo "Success!";
    echo '
    <form action="displayFiles.php" method="Post">
        <button type="submit">Go Back</button>
   </form>
    '; 
}else{
	echo "Upload failed. Please try again.";
    echo '
    <form action="displayFiles.php" method="Post">
        <button type="submit">Go Back</button>
   </form>
    '; 
	exit;
}


?>