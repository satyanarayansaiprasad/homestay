<?php
/**
 * MyHomestayMP Configuration File
 */

// Site Information
define('SITE_NAME', 'MyHomestayMP');
define('SITE_URL', 'https://inforicha.com/development/homestay/'); // Adjust to your local setup
define('CONTACT_EMAIL', 'myhomestaymp@gmail.com');
define('CONTACT_PHONE', '7974262399');

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'u865727365_homestay');
define('DB_USER', 'u865727365_homestay');
define('DB_PASS', 'Hs@540720');

// SMTP Configuration (Placeholders)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'myhomestaymp@gmail.com');
define('SMTP_PASS', ''); // User must provide this
define('SMTP_FROM_NAME', SITE_NAME);

// Paths
define('BASE_PATH', dirname(__DIR__));
define('UPLOADS_PATH', SITE_URL . '/uploads/properties/');
define('UPLOADS_DIR', BASE_PATH . '/uploads/properties/');

// Session & Security
session_start();

// Helper to get base URL
function url($path = '')
{
    if (strpos($path, 'http') === 0 || strpos($path, '//') === 0) {
        return $path;
    }
    return rtrim(SITE_URL, '/') . '/' . ltrim($path, '/');
}
