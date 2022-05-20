<?php
session_start();

// destroy the session to logout
session_destroy();
//redirect to login after logout
header('Location: /feedback/index.php');
