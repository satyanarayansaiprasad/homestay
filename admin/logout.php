<?php
require_once '../includes/db.php';
unset($_SESSION['admin_id']);
unset($_SESSION['admin_user']);
session_destroy();
session_start();
set_flash_message('success', 'Admin session ended.');
redirect('admin/login.php');
