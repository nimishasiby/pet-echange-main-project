<?php
session_start();
session_destroy();
header("location:../reg/register/login.php");
?>