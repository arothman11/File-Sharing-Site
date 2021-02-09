<?php
session_start();
session_destroy(); //destroy the session
header("Location: main.php"); //redirect to sign in page
?>