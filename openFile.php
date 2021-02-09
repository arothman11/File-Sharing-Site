        <?php
        session_start();
        $username = $_SESSION["user"];
        $filename = $_POST['file'];
        // Get the username and make sure that it is alphanumeric with limited other characters.
        // You shouldn't allow usernames with unusual characters anyway, but it's always best to perform a sanity check
        // since we will be concatenating the string to load files from the filesystem.
        if( !preg_match('/^[\w_\-]+$/', $username) ){
            echo "Invalid username";
            exit;
        }

        // We need to make sure that the filename is in a valid format; if it's not, display an error and leave the script.
        // To perform the check, we will use a regular expression.
        if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
            echo "Invalid filename";
            exit;
        }

        $full_path = sprintf("/home/emcclanahan/CSE330_Module2_Files/%s/%s", $username, $filename);
        // Now we need to get the MIME type (e.g., image/jpeg).  PHP provides a neat little interface to do this called finfo.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($full_path);
        
        ob_clean();
        // Finally, set the Content-Type header to the MIME type of the file, and display the file.
        header("Content-Type: ".$mime);
        header('content-disposition: inline; filename="'.$filename.'";');
        readfile($full_path);
        ?>