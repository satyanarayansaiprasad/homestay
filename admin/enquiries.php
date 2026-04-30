<?php
require_once '../includes/db.php';

if (!is_admin_logged_in()) {
    redirect('admin/login.php');
}

// Handle Delete Action
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];
    try {
        $stmt = db()->prepare("DELETE FROM enquiries WHERE id = ?");
        $stmt->execute([$delete_id]);
        set_flash_message('success', 'Enquiry deleted successfully.');
        redirect('admin/enquiries.php');
    } catch (Exception $e) {
        set_flash_message('danger', 'Error deleting enquiry.');
    }
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

// Fetch enquiries with filters
try {
    $stmt = db()->prepare("
        SELECT e.*, p.title as property_name, u.email as owner_email 
        FROM enquiries e 
        LEFT JOIN properties p ON e.property_id = p.id 
        LEFT JOIN users u ON p.owner_id = u.id 
        $where_sql
        ORDER BY e.created_at DESC
    ");
    $stmt->execute($params);
    $enquiries = $stmt->fetchAll();
} catch (Exception $e) {
    die("Error loading enquiries.");
}

$page_title = 'Enquiry Management';
include '../includes/header.php';
?>

<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Guest Enquiries</h2>
            <div class="d-flex gap-2">
                <a href="export_enquiries.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" class="btn btn-success"><i class="fas fa-file-excel me-2"></i>Export CSV</a>
                <a href="dashboard.php" class="btn btn-outline-dark">Back</a>
            </div>
        </div>

        <!-- Filter Form -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
            <form action="" method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label small fw-bold">Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>">
                </div>
                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary-custom flex-grow-1">Apply Filter</button>
                    <a href="enquiries.php" class="btn btn-outline-secondary">Reset</a>
                </div>
            </form>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="p-3">Guest Details</th>
                            <th class="p-3">Property</th>
                            <th class="p-3">Message</th>
                            <th class="p-3">Date</th>
                            <th class="p-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($enquiries)): ?>
                            <tr><td colspan="5" class="text-center py-5 text-muted">No enquiries found for the selected criteria.</td></tr>
                        <?php else: ?>
                            <?php foreach($enquiries as $enq): ?>
                            <tr>
                                <td class="p-3">
                                    <strong><?php echo $enq['name']; ?></strong><br>
                                    <small class="text-muted"><?php echo $enq['email']; ?></small><br>
                                    <small class="text-muted"><?php echo $enq['phone']; ?></small>
                                </td>
                                <td class="p-3">
                                    <?php if($enq['property_name']): ?>
                                        <span class="text-primary"><?php echo $enq['property_name']; ?></span><br>
                                        <small class="text-muted">Owner: <?php echo $enq['owner_email']; ?></small>
                                    <?php else: ?>
                                        <span class="text-muted">General Inquiry</span>
                                    <?php endif; ?>
                                </td>
                                <td class="p-3">
                                    <p class="mb-0 small" style="max-width: 300px;"><?php echo nl2br($enq['message']); ?></p>
                                </td>
                                <td class="p-3">
                                    <?php echo date('M d, Y', strtotime($enq['created_at'])); ?><br>
                                    <small class="text-muted"><?php echo date('h:i A', strtotime($enq['created_at'])); ?></small>
                                </td>
                                <td class="p-3 text-end">
                                    <a href="mailto:<?php echo $enq['email']; ?>" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-reply"></i></a>
                                    <a href="?delete_id=<?php echo $enq['id']; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" 
                                       class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm('Delete this enquiry?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
