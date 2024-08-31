<?php
session_start();
// Unset and destroy session
session_unset();
session_destroy();
header('Location: user-login.php');
exit();
?>
