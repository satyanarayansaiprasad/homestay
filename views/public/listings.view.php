<?php
include 'includes/header.php';

// Pagination & Filters
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 9;
$offset = ($page - 1) * $limit;

$where = ["p.status = 'LIVE'"];
$params = [];

if (!empty($_GET['location'])) {
    $where[] = "p.location LIKE ?";
    $params[] = "%" . $_GET['location'] . "%";
}

if (!empty($_GET['category'])) {
    $where[] = "p.category = ?";
    $params[] = $_GET['category'];
}

$where_sql = implode(" AND ", $where);

try {
    $stmt = db()->prepare("SELECT p.*, (SELECT image_path FROM property_images WHERE property_id = p.id LIMIT 1) as main_image FROM properties p JOIN users u ON p.owner_id = u.id WHERE u.status = 'active' AND $where_sql LIMIT $limit OFFSET $offset");
    $stmt->execute($params);
    $properties = $stmt->fetchAll();

    // Total for pagination
    $stmt_count = db()->prepare("SELECT COUNT(*) FROM properties p JOIN users u ON p.owner_id = u.id WHERE u.status = 'active' AND $where_sql");
    $stmt_count->execute($params);
    $total_rows = $stmt_count->fetchColumn();
    $total_pages = ceil($total_rows / $limit);
} catch (Exception $e) {
    $properties = [];
    $total_pages = 0;
}
?>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h5 class="mb-4">Filter By</h5>
                    <form action="" method="GET">
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" placeholder="City or Region" value="<?php echo $_GET['location'] ?? ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Property Type</label>
                            <select name="category" class="form-select">
                                <option value="">All Types</option>
                                <option value="Homestay" <?php echo ($_GET['category'] ?? '') == 'Homestay' ? 'selected' : ''; ?>>Homestay</option>
                                <option value="Farm Stay" <?php echo ($_GET['category'] ?? '') == 'Farm Stay' ? 'selected' : ''; ?>>Farm Stay</option>
                                <option value="Village Stay" <?php echo ($_GET['category'] ?? '') == 'Village Stay' ? 'selected' : ''; ?>>Village Stay</option>
                                <option value="B&B" <?php echo ($_GET['category'] ?? '') == 'B&B' ? 'selected' : ''; ?>>B&B</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100">Apply Filters</button>
                        <a href="listings.php" class="btn btn-link text-muted w-100 mt-2 text-decoration-none">Clear All</a>
                    </form>
                </div>
            </div>

            <!-- Listings Grid -->
<div class="col-lg-9 mt-4 mt-lg-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="h4">Available Stays (<?php echo $total_rows; ?>)</h3>
    </div>

    <div class="row g-3 g-md-4">
        <?php if (empty($properties)): ?>
            <div class="col-12 text-center py-5">
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-state-2130362-1800926.png" alt="Empty" class="img-fluid" style="max-width: 250px;">
                <p class="mt-4 text-muted">No homestays found matching your criteria.</p>
            </div>
        <?php else: ?>
            <?php foreach($properties as $prop): ?>
            <div class="col-12 col-sm-6 col-xl-4">
                <div class="property-card h-100 position-relative shadow-sm rounded-4">
                    <img src="<?php echo $prop['main_image'] ? url($prop['main_image']) : 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=600&q=80'; ?>" alt="<?php echo $prop['title']; ?>" class="w-100">
                    <span class="price-tag">₹<?php echo number_format($prop['price']); ?></span>
                    <div class="p-3 p-md-4 d-flex flex-column" style="min-height: 250px;">
                        <small class="text-uppercase text-secondary fw-bold"><?php echo $prop['category']; ?></small>
                        <h3 class="h5 mt-2 h-ellipsis"><?php echo $prop['title']; ?></h3>
                        <p class="small text-muted mb-3"><i class="fas fa-map-marker-alt me-2 text-primary"></i><?php echo $prop['location']; ?></p>
                        <p class="text-muted small mb-4 flex-grow-1"><?php echo substr($prop['description'], 0, 70); ?>...</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="small"><i class="fas fa-bed me-1"></i> <?php echo $prop['rooms']; ?> Rooms</span>
                            <a href="<?php echo url('property/' . $prop['slug']); ?>" class="btn btn-primary-custom btn-sm">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

                <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                <nav class="mt-5">
                    <ul class="pagination justify-content-center">
                        <?php for($i=1; $i<=$total_pages; $i++): ?>
                        <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>&location=<?php echo $_GET['location'] ?? ''; ?>&category=<?php echo $_GET['category'] ?? ''; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
