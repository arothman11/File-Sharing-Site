<html lang="en">
<head>
    <title>Module 2 Group</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="newUser.php" method="Post">
        <label for="newUsername">Username</label>
        <input type="text" name="newUsername">
        <input type="submit">
    </form>

<?php

$newUsername = $_POST['newUsername'];

//making sure the username is valid
if($newUsername != null) {
    if( !preg_match('/^[\w_\-]+$/', $newUsername) ){
        echo "<p>Invalid username</p>";
        exit;
    }
}

$userList = fopen('/home/emcclanahan/CSE330_Module2_Files/users.txt','r') or die("didn't open"); //path to file
while($line = fgets($userList)) {
    $line = rtrim($line, "\r\n");
    if ($newUsername == $line) {
        fclose($userList);
        echo "<p>Username already taken. Please try again.</p>";
        exit;
    }
}

if($newUsername != null) {
    mkdir("/home/emcclanahan/CSE330_Module2_Files/$newUsername");
    chmod("/home/emcclanahan/CSE330_Module2_Files/$newUsername", 0777);
    $userList = fopen('/home/emcclanahan/CSE330_Module2_Files/users.txt','a') or die("didn't open"); //path to fil
    if (fwrite($userList, "\n$newUsername")) {
        $newUsername = "";
        echo "<p>User successfully created.</p>";
        echo '
        <form action="main.php" method="Post">
            <button type="submit">Return Home</button>
        </form>
        '; 
    }
    fclose($userList);
    
    //cleaning up empty lines
    $stringList = file_get_contents("/home/emcclanahan/CSE330_Module2_Files/users.txt");
    $stringList = preg_replace('/^\h*\v+/m', '', $stringList);
    file_put_contents("/home/emcclanahan/CSE330_Module2_Files/users.txt", $stringList);
}


?>
</body>
</html>