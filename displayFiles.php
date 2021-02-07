<!DOCTYPE html>
<html lang="en">
<head>
    <title>Module 2 Group</title>
</head>
<body>
</body>
<?php
        session_start();
        $username = $_SESSION["user"];
        echo $username;
        $dir = opendir("/home/emcclanahan/CSE330_Module2_Files/" . $username);
        
        while (($file = readdir($dir)) !== false){
           if (($file==".." || $file==".")) {
           }
           else {
            echo '<form action="openFile.php" method="Post">';
            echo "<button type='submit' name='file' value='$file'>$file</button>";
            echo '</form>';

            echo '<form action="delete.php" method="Post">';
            echo "<button type='submit' name='delete' value='$file'>delete</button>";
            echo '</form>';
           }
        }
        closedir($dir);
        echo '<form enctype="multipart/form-data" action="upload.php" method="POST">
            <p>
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                <label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
            </p>
            <p>
                <input type="submit" value="Upload File" />
            </p>
        </form>';

        echo '
    <form action="main.php" method="Post">
        <button type="submit">Go Back To Sign In Page</button>
   </form>
    '; 
?>
</html>