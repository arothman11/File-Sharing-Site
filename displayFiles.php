<!DOCTYPE html>
<html lang="en">
<head>
    <title>Module 2 Group</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
        session_start();
        $username = $_SESSION["user"];
        if( !preg_match('/^[\w_\-]+$/', $username) ){
            echo "Invalid username";
            exit;
        }
        
        echo "<h1 id='user'>$username's Files</h1>";
        echo '
            <form action="logout.php" method="Post" id="logout">
                <button type="submit" id="logout-button">Log Out</button>
            </form>
            '; 

        $dir = opendir("/home/emcclanahan/CSE330_Module2_Files/" . $username);
        
        //creating an array with all the user's files
        $filesArray = array();
        while (($file = readdir($dir)) !== false){
           if (($file==".." || $file==".")) {
           }
           else {
            array_push($filesArray, $file);
           }
        }

        //if they clicked sort, sort the array alphabetically
        $sorted = $_POST['sort'];
        if ($sorted =='sorted') {
            natcasesort($filesArray);
        }

        //display files as buttons
        foreach($filesArray as $file) {
            echo '<form action="openFile.php" method="Post" class="files">';
            echo "<button type='submit' name='file' value='$file'>$file</button>";
            echo '</form>';

            echo '<form action="delete.php" method="Post" class="delete">';
            echo "<button type='submit' name='delete' value='$file'>Delete</button>";
            echo '</form>';
        }
        
    
        echo '<form action="displayFiles.php" method="Post">';
        echo "<button type='submit' name='sort' value='sorted'>Sort Files Alphabetically</button>";
        echo '</form>';

        
        closedir($dir);
        echo '<hr>';
        echo '<form enctype="multipart/form-data" action="upload.php" method="POST" id="upload">
            <p>
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                <label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
            </p>
            <p>
                <input type="submit" value="Upload File" />
            </p>
        </form>';

        echo '
            <form action="deleteUser.php" method="Post">
                <button type="submit">Delete Account</button>
            </form>
            '; 
?>
</body>
</html>