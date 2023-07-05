<?php
session_start();
unset($_SESSION['cid']);
unset($_SESSION['cliente']);
header('location: ../../');
?>