<?php
require_once '../includes/db.php';

if (!is_admin_logged_in()) {
    redirect('admin/login.php');
}

// Handle Approval Actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $status = ($_GET['action'] === 'approve') ? 'LIVE' : 'Rejected';
    
    try {
        $stmt = db()->prepare("UPDATE properties SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
        
        // TODO: Send Email to Owner
        
        set_flash_message('success', "Property status updated to $status.");
        redirect('admin/approvals.php');
    } catch (Exception $e) {
        set_flash_message('danger', "Error updating status.");
    }
}

// Get Pending Properties
try {
    $stmt = db()->query("SELECT p.*, u.name as owner, u.email as owner_email FROM properties p JOIN users u ON p.owner_id = u.id ORDER BY p.created_at DESC");
    $all_properties = $stmt->fetchAll();
} catch (Exception $e) {
    die("Error loading data.");
}

$page_title = 'Property Management';
include '../includes/header.php';
?>

<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Property Approval System</h2>
            <a href="dashboard.php" class="btn btn-outline-dark">Back to Dashboard</a>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="p-3">Property Details</th>
                            <th class="p-3">Owner</th>
                            <th class="p-3">Category</th>
                            <th class="p-3">Price</th>
                            <th class="p-3">Status</th>
                            <th class="p-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($all_properties as $p): ?>
                        <tr>
                            <td class="p-3">
                                <strong><?php echo $p['title']; ?></strong><br>
                                <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i> <?php echo $p['location']; ?></small>
                            </td>
                            <td class="p-3">
                                <?php echo $p['owner']; ?><br>
                                <small class="text-muted"><?php echo $p['owner_email']; ?></small>
                            </td>
                            <td class="p-3"><?php echo $p['category']; ?></td>
                            <td class="p-3">₹<?php echo number_format($p['price']); ?></td>
                            <td class="p-3">
                                <span class="badge-status <?php echo 'status-' . strtolower($p['status']); ?>">
                                    <?php echo $p['status']; ?>
                                </span>
                            </td>
                            <td class="p-3 text-end">
                                <?php if($p['status'] === 'Pending'): ?>
                                    <a href="?action=approve&id=<?php echo $p['id']; ?>" class="btn btn-sm btn-success me-1 px-3" onclick="return confirm('Approve this property?')">Approve</a>
                                    <a href="?action=reject&id=<?php echo $p['id']; ?>" class="btn btn-sm btn-danger px-3" onclick="return confirm('Reject this property?')">Reject</a>
                                <?php endif; ?>
                                <a href="<?php echo url('property/' . $p['slug']); ?>" class="btn btn-sm btn-outline-primary ms-1" target="_blank"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
