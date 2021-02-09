<!DOCTYPE html>
<html lang="en">
<head>
    <title>Module 2 Group</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="login">
    <h1>Log In</h1>
    <p>Please enter your username in the text field below to access your file library.</p>
    <form action="main.php" method="Get">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <input type="submit">
   </form>
   </div>
    <form action="newUser.php">
        <label for="new">Don't have a username?</label>
        <button name="new">Create New Account</button>
    </form>
<?php
session_destroy();
session_start();
$username = $_GET['username'];
$userList = fopen('/home/emcclanahan/CSE330_Module2_Files/users.txt','r') or die("didn't open"); //path to file

while($line = fgets($userList)) {
    $line = rtrim($line, "\r\n");
    if ($username == $line) {
        $_SESSION["user"]=$username;
        fclose($userList);
        header("Location: displayFiles.php");
    }
}
fclose($userList);
?>
</body>
</html>

<!-- 
    sign out not working
    delete user is messy with "test" and "testing"
    validate html
    write readme
    add comments to code
 -->