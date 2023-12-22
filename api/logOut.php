<?php 
session_start();
session_destroy();
header('Location: https://donnarifrancisco.vercel.app/api/index.php');
?>