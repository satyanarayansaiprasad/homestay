<?php
require_once 'includes/db.php';

try {
    $db = db();
    // Check if columns exist
    $stmt = $db->query("SHOW COLUMNS FROM users LIKE 'terms_accepted'");
    if (!$stmt->fetch()) {
        $db->exec("ALTER TABLE users ADD COLUMN terms_accepted BOOLEAN DEFAULT 0");
        echo "Column 'terms_accepted' added successfully.\n";
    } else {
        echo "Column 'terms_accepted' already exists.\n";
    }

    $stmt = $db->query("SHOW COLUMNS FROM users LIKE 'terms_accepted_at'");
    if (!$stmt->fetch()) {
        $db->exec("ALTER TABLE users ADD COLUMN terms_accepted_at TIMESTAMP NULL");
        echo "Column 'terms_accepted_at' added successfully.\n";
    } else {
        echo "Column 'terms_accepted_at' already exists.\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
