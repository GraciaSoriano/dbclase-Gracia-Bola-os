<?php
session_starr();

session_destroy();
header("Location: index.php");
exit();

?>