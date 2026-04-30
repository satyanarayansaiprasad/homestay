<?php
require_once '../includes/db.php';

if (!is_admin_logged_in()) {
    die("Unauthorized");
}

// Filters
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

$where = [];
$params = [];

if ($start_date) {
    $where[] = "DATE(e.created_at) >= ?";
    $params[] = $start_date;
}
if ($end_date) {
    $where[] = "DATE(e.created_at) <= ?";
    $params[] = $end_date;
}

$where_sql = !empty($where) ? "WHERE " . implode(" AND ", $where) : "";

try {
    $stmt = db()->prepare("
        SELECT e.name, e.email, e.phone, e.message, e.created_at, p.title as property_name, u.email as owner_email
        FROM enquiries e 
        LEFT JOIN properties p ON e.property_id = p.id 
        LEFT JOIN users u ON p.owner_id = u.id 
        $where_sql
        ORDER BY e.created_at DESC
    ");
    $stmt->execute($params);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // CSV Headers
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=enquiries_' . date('Y-m-d') . '.csv');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['Guest Name', 'Email', 'Phone', 'Property', 'Owner Email', 'Message', 'Date Received']);

    foreach ($data as $row) {
        fputcsv($output, [
            $row['name'],
            $row['email'],
            $row['phone'],
            $row['property_name'] ?: 'General Inquiry',
            $row['owner_email'] ?: 'N/A',
            $row['message'],
            $row['created_at']
        ]);
    }
    fclose($output);
    exit;

} catch (Exception $e) {
    die("Error exporting data: " . $e->getMessage());
}
