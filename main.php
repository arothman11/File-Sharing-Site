<!DOCTYPE html>
<html lang="en">
<head>
    <title>Module 2 Group</title>
</head>
<body>
    <form action="main.php" method="Get">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <input type="submit">
   </form>
</body>
<?php
session_start();
$username = $_GET['username'];
$userList = fopen('/home/emcclanahan/CSE330_Module2_Files/users.txt','r') or die("didn't open"); //path to file

while($line = fgets($userList)) {
    $line = rtrim($line, "\r\n");
    if ($username == $line) {
        $_SESSION["user"]=$username;
        header("Location: displayFiles.php");

    }
}
//unlink to delete
//upload file on wiki
?>
</html>
