<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Agar login qilingan bo‘lsa, index.html sahifasiga yo‘naltiramiz
header("Location: index.html");
exit();
?>
