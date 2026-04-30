<?php
require_once '../includes/db.php';

if (!is_logged_in()) {
    redirect('owner/login.php');
}

$owner_id = $_SESSION['user_id'];

// Fetch enquiries for THIS owner's properties
try {
    $stmt = db()->prepare("
        SELECT e.*, p.title as property_name 
        FROM enquiries e 
        JOIN properties p ON e.property_id = p.id 
        WHERE p.owner_id = ? 
        ORDER BY e.created_at DESC
    ");
    $stmt->execute([$owner_id]);
    $enquiries = $stmt->fetchAll();
} catch (Exception $e) {
    die("Error loading enquiries.");
}

$page_title = 'My Guest Enquiries';
include '../includes/header.php';
?>

<div class="bg-light py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-0">Guest Enquiries</h2>
            <p class="text-muted mb-0">Track and respond to guest leads for your properties.</p>
        </div>
        <a href="dashboard.php" class="btn btn-outline-dark">Back to Dashboard</a>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="p-3">Guest Info</th>
                            <th class="p-3">Property</th>
                            <th class="p-3">Message</th>
                            <th class="p-3">Date</th>
                            <th class="p-3 text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($enquiries)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">No guest enquiries yet. Make sure your properties are LIVE!</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($enquiries as $enq): ?>
                            <tr>
                                <td class="p-3">
                                    <strong><?php echo $enq['name']; ?></strong><br>
                                    <small class="text-muted"><?php echo $enq['email']; ?></small><br>
                                    <small class="text-muted"><?php echo $enq['phone']; ?></small>
                                </td>
                                <td class="p-3">
                                    <span class="badge bg-primary-custom"><?php echo $enq['property_name']; ?></span>
                                </td>
                                <td class="p-3">
                                    <p class="mb-0 small" style="max-width: 350px;"><?php echo nl2br($enq['message']); ?></p>
                                </td>
                                <td class="p-3">
                                    <?php echo date('M d, Y', strtotime($enq['created_at'])); ?><br>
                                    <small class="text-muted"><?php echo date('h:i A', strtotime($enq['created_at'])); ?></small>
                                </td>
                                <td class="p-3 text-end">
                                    <a href="mailto:<?php echo $enq['email']; ?>" class="btn btn-sm btn-primary-custom px-4">Reply</a>
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
