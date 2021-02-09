<?php
session_start();
$username = $_SESSION["user"];

$dir_path = sprintf("/home/emcclanahan/CSE330_Module2_Files/%s", $username); //path to the user's directory
chdir($dir_path);
$files = scandir($dir_path);
for ($i=0; $i<count($files); $i++)  { //deleting all files in the directory
    $filename = $files[$i];
    $full_path = sprintf("/home/emcclanahan/CSE330_Module2_Files/%s/%s", $username, $filename);
    unlink($full_path);
}
rmdir($dir_path); //removing the directory

//updating users.txt
$stringList = file_get_contents("/home/emcclanahan/CSE330_Module2_Files/users.txt");
$stringList = preg_replace("/\b$username\b/", "", $stringList); 
$stringList = preg_replace('/^\h*\v+/m', '', $stringList);
file_put_contents("/home/emcclanahan/CSE330_Module2_Files/users.txt", "");
file_put_contents("/home/emcclanahan/CSE330_Module2_Files/users.txt", $stringList);
echo "Account successfully deleted.";
echo '
    <form action="main.php" method="Post">
        <button type="submit">Go Back</button>
   </form>';
?>