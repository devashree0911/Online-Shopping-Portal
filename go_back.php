<?php
session_start();
unset($_SESSION['tr_id']);
unset($_SESSION['total_amount']);
header('location:profile.php');
?>
