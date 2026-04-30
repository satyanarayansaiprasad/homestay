<?php
require_once '../includes/db.php';
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
session_destroy();
session_start(); // Restart to allow flash message
set_flash_message('success', 'You have been logged out.');
redirect('owner/login.php');
