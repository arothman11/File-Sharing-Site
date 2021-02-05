<!DOCTYPE html>
<html lang="en">
<head>
    <title>Module 2 Group</title>
</head>
<body>
    <form action="main.php" method="GET">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <input type="submit">
   </form>
</body>
<?php
$username = $_GET['username'];
$userList = fopen('/home/emcclanahan/public_html/module2-group-464202-475030/users.txt','r') or die("didn't open"); //path to file

while($line = fgets($userList)) {
    $line = rtrim($line, "\r\n");
    if ($username == $line) {
        echo $username;
        $_SESSION["user"]=$username;
    }
}
//switching pages: header("Location: filename")
?>
</html>
