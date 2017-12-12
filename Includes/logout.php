<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['usrId']);
header('location: ../Views/Goodbye.php');