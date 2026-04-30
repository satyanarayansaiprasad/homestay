<?php
require_once dirname(__DIR__) . '/config/config.php';

/**
 * Database Connection using PDO
 */
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }
}

/**
 * Global helper for DB connection
 */
function db() {
    return Database::getInstance();
}

/**
 * Secure Session Helpers
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function is_admin_logged_in() {
    return isset($_SESSION['admin_id']);
}

function redirect($path) {
    header("Location: " . url($path));
    exit;
}

/**
 * Flash Messages
 */
function set_flash_message($type, $message) {
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function get_flash_message() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}
