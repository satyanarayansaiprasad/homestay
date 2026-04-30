<?php
require_once '../includes/db.php';

if (!is_admin_logged_in()) {
    redirect('admin/login.php');
}

// Handle Block/Unblock Actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $status = ($_GET['action'] === 'block') ? 'inactive' : 'active';
    
    try {
        $stmt = db()->prepare("UPDATE users SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
        
        set_flash_message('success', "User status updated to " . ucfirst($status) . ".");
        redirect('admin/users.php');
    } catch (Exception $e) {
        set_flash_message('danger', "Error updating user status.");
    }
}

// Fetch all users
try {
    $stmt = db()->query("SELECT u.*, (SELECT COUNT(*) FROM properties WHERE owner_id = u.id) as property_count FROM users u ORDER BY u.created_at DESC");
    $users = $stmt->fetchAll();
} catch (Exception $e) {
    die("Error loading users.");
}

$page_title = 'Owner Management';
include '../includes/header.php';
?>

<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Manage Property Owners</h2>
            <a href="dashboard.php" class="btn btn-outline-dark">Back to Dashboard</a>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="p-3">User Details</th>
                            <th class="p-3">Phone</th>
                            <th class="p-3">Properties</th>
                            <th class="p-3">Status</th>
                            <th class="p-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                        <tr>
                            <td class="p-3">
                                <strong><?php echo $user['name']; ?></strong><br>
                                <small class="text-muted"><?php echo $user['email']; ?></small>
                            </td>
                            <td class="p-3"><?php echo $user['phone']; ?></td>
                            <td class="p-3">
                                <span class="badge bg-secondary"><?php echo $user['property_count']; ?> Listings</span>
                            </td>
                            <td class="p-3">
                                <span class="badge <?php echo $user['status'] === 'active' ? 'bg-success' : 'bg-danger'; ?>">
                                    <?php echo ucfirst($user['status']); ?>
                                </span>
                            </td>
                            <td class="p-3 text-end">
                                <?php if($user['status'] === 'active'): ?>
                                    <a href="?action=block&id=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-danger px-3" onclick="return confirm('Block this owner? They will not be able to log in.')">Block</a>
                                <?php else: ?>
                                    <a href="?action=unblock&id=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-success px-3" onclick="return confirm('Unblock this owner?')">Unblock</a>
                                <?php endif; ?>
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
