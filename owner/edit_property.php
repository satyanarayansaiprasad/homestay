<?php
require_once '../includes/db.php';

if (!is_logged_in()) {
    redirect('owner/login.php');
}

$owner_id = $_SESSION['user_id'];
$property_id = $_GET['id'] ?? null;

if (!$property_id) {
    redirect('owner/dashboard.php');
}

// Fetch property and verify ownership
try {
    $stmt = db()->prepare("SELECT * FROM properties WHERE id = ? AND owner_id = ?");
    $stmt->execute([$property_id, $owner_id]);
    $property = $stmt->fetch();

    if (!$property) {
        set_flash_message('danger', 'Property not found or access denied.');
        redirect('owner/dashboard.php');
    }

    // Fetch existing amenities
    $stmt_amen = db()->prepare("SELECT name FROM amenities WHERE property_id = ?");
    $stmt_amen->execute([$property_id]);
    $existing_amenities = $stmt_amen->fetchAll(PDO::FETCH_COLUMN);
    $amenities_str = implode(', ', $existing_amenities);

    // Fetch existing facilities
    $stmt_fac = db()->prepare("SELECT name FROM facilities WHERE property_id = ?");
    $stmt_fac->execute([$property_id]);
    $existing_facilities = $stmt_fac->fetchAll(PDO::FETCH_COLUMN);
    $facilities_str = implode(', ', $existing_facilities);

    // Fetch images
    $stmt_imgs = db()->prepare("SELECT * FROM property_images WHERE property_id = ?");
    $stmt_imgs->execute([$property_id]);
    $images = $stmt_imgs->fetchAll();

} catch (Exception $e) {
    die("Error loading property data.");
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $location = trim($_POST['location']);
    $price = $_POST['price'];
    $category = $_POST['category'];
    $rooms = $_POST['rooms'];

    try {
        db()->beginTransaction();

        // Update Property
        $stmt_update = db()->prepare("UPDATE properties SET title = ?, description = ?, location = ?, price = ?, category = ?, rooms = ?, status = 'Pending' WHERE id = ? AND owner_id = ?");
        $stmt_update->execute([$title, $description, $location, $price, $category, $rooms, $property_id, $owner_id]);

        // Clear and Update Amenities (Assuming comma separated input)
        db()->prepare("DELETE FROM amenities WHERE property_id = ?")->execute([$property_id]);
        if (!empty($_POST['amenities'])) {
            // If it's an array from name="amenities[]", take the first element if it contains the comma list
            $raw_amen = is_array($_POST['amenities']) ? $_POST['amenities'][0] : $_POST['amenities'];
            $amen_list = explode(',', $raw_amen);
            $stmt_amen_ins = db()->prepare("INSERT INTO amenities (property_id, name) VALUES (?, ?)");
            foreach ($amen_list as $amen) {
                if (trim($amen)) {
                    $stmt_amen_ins->execute([$property_id, trim($amen)]);
                }
            }
        }

        // Clear and Update Facilities
        db()->prepare("DELETE FROM facilities WHERE property_id = ?")->execute([$property_id]);
        if (!empty($_POST['facilities'])) {
            $raw_fac = is_array($_POST['facilities']) ? $_POST['facilities'][0] : $_POST['facilities'];
            $fac_list = explode(',', $raw_fac);
            $stmt_fac_ins = db()->prepare("INSERT INTO facilities (property_id, name) VALUES (?, ?)");
            foreach ($fac_list as $fac) {
                if (trim($fac)) {
                    $stmt_fac_ins->execute([$property_id, trim($fac)]);
                }
            }
        }

        // Handle Image Uploads
        if (!empty($_FILES['images']['name'][0])) {
            $total_files = count($_FILES['images']['name']);
            $upload_dir = '../uploads/properties/';
            if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

            $stmt_img = db()->prepare("INSERT INTO property_images (property_id, image_path, is_main) VALUES (?, ?, ?)");

            for ($i = 0; $i < min($total_files, 12); $i++) {
                $file_name = time() . '_' . $_FILES['images']['name'][$i];
                $file_tmp = $_FILES['images']['tmp_name'][$i];
                $file_path = 'uploads/properties/' . $file_name;

                if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                    // If no images existed before, make the first one main
                    $is_main = (empty($images) && $i === 0) ? 1 : 0;
                    $stmt_img->execute([$property_id, $file_path, $is_main]);
                }
            }
        }

        // Handle Image Deletion
        if (!empty($_POST['delete_images'])) {
            $stmt_del_img = db()->prepare("DELETE FROM property_images WHERE id = ? AND property_id = ?");
            foreach ($_POST['delete_images'] as $img_id) {
                // Also delete physical file if possible
                $stmt_get_path = db()->prepare("SELECT image_path FROM property_images WHERE id = ?");
                $stmt_get_path->execute([$img_id]);
                $path = $stmt_get_path->fetchColumn();
                if ($path && file_exists('../' . $path)) {
                    unlink('../' . $path);
                }
                $stmt_del_img->execute([$img_id, $property_id]);
            }
        }

        db()->commit();
        set_flash_message('success', 'Property updated successfully! Status is now Pending for admin re-approval.');
        redirect('owner/dashboard.php');

    } catch (Exception $e) {
        db()->rollBack();
        $error = 'Error updating property: ' . $e->getMessage();
    }
}

$page_title = 'Edit Property';
include '../includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow rounded-4 p-4 p-md-5">
                    <div class="d-flex align-items-center mb-4">
                        <a href="dashboard.php" class="btn btn-sm btn-outline-secondary me-3"><i class="fas fa-arrow-left"></i></a>
                        <h2 class="h3 mb-0">Edit Your Homestay</h2>
                    </div>
                    
                    <?php if($error): ?>
                        <div class="alert alert-danger px-3"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row g-3 g-md-4">
                            <div class="col-12 col-md-8">
                                <label class="form-label fw-bold small">Property Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($property['title']); ?>" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-bold small">Category</label>
                                <select name="category" class="form-select" required>
                                    <option value="Homestay" <?php echo $property['category'] == 'Homestay' ? 'selected' : ''; ?>>Homestay</option>
                                    <option value="Farm Stay" <?php echo $property['category'] == 'Farm Stay' ? 'selected' : ''; ?>>Farm Stay</option>
                                    <option value="Village Stay" <?php echo $property['category'] == 'Village Stay' ? 'selected' : ''; ?>>Village Stay</option>
                                    <option value="B&B" <?php echo $property['category'] == 'B&B' ? 'selected' : ''; ?>>B&B</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small">Description</label>
                                <textarea name="description" class="form-control" rows="5" required><?php echo htmlspecialchars($property['description']); ?></textarea>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-bold small">Location</label>
                                <input type="text" name="location" class="form-control" value="<?php echo htmlspecialchars($property['location']); ?>" required>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label fw-bold small">Price (₹)</label>
                                <input type="number" name="price" class="form-control" value="<?php echo $property['price']; ?>" required>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label fw-bold small">Rooms</label>
                                <input type="number" name="rooms" class="form-control" value="<?php echo $property['rooms']; ?>" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-bold small">Amenities (Comma separated)</label>
                                <input type="text" name="amenities[]" class="form-control" value="<?php echo htmlspecialchars($amenities_str); ?>">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-bold small">Facilities (Comma separated)</label>
                                <input type="text" name="facilities[]" class="form-control" value="<?php echo htmlspecialchars($facilities_str); ?>">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small">Current Images</label>
                                <div class="row g-2 mb-3">
                                    <?php foreach ($images as $img): ?>
                                        <div class="col-4 col-md-2 position-relative">
                                            <img src="<?php echo url($img['image_path']); ?>" class="img-fluid rounded border shadow-sm">
                                            <div class="form-check position-absolute top-0 start-0 m-1 bg-white rounded p-1">
                                                <input class="form-check-input" type="checkbox" name="delete_images[]" value="<?php echo $img['id']; ?>" id="del_<?php echo $img['id']; ?>">
                                                <label class="form-check-label ps-1 text-danger small pt-1" for="del_<?php echo $img['id']; ?>">Delete</label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <label class="form-label fw-bold small">Upload New Images (Max 12 total)</label>
                                <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                            </div>

                            <div class="col-12 mt-5">
                                <hr class="opacity-10">
                                <div class="row g-2">
                                    <div class="col-12 col-md-auto order-2 order-md-1">
                                        <a href="dashboard.php" class="btn btn-outline-secondary w-100 px-5">Cancel</a>
                                    </div>
                                    <div class="col-12 col-md-auto ms-md-auto order-1 order-md-2">
                                        <button type="submit" class="btn btn-primary-custom w-100 px-5 fw-bold">Update Property</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
