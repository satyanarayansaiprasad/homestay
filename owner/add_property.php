<?php
require_once '../includes/db.php';

if (!is_logged_in()) {
    redirect('owner/login.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $owner_id = $_SESSION['user_id'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $location = trim($_POST['location']);
    $price = $_POST['price'];
    $category = $_POST['category'];
    $rooms = $_POST['rooms'];
    
    // Generate Slug
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $slug .= '-' . rand(1000, 9999); // Ensure uniqueness

    try {
        db()->beginTransaction();

        $stmt = db()->prepare("INSERT INTO properties (owner_id, title, slug, description, location, price, category, rooms, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Pending')");
        $stmt->execute([$owner_id, $title, $slug, $description, $location, $price, $category, $rooms]);
        $property_id = db()->lastInsertId();

        // Handle Amenities
        if (!empty($_POST['amenities'])) {
            $raw_amen = is_array($_POST['amenities']) ? $_POST['amenities'][0] : $_POST['amenities'];
            $amen_list = explode(',', $raw_amen);
            $stmt_amen = db()->prepare("INSERT INTO amenities (property_id, name) VALUES (?, ?)");
            foreach ($amen_list as $amen) {
                if (trim($amen)) {
                    $stmt_amen->execute([$property_id, trim($amen)]);
                }
            }
        }

        // Handle Facilities
        if (!empty($_POST['facilities'])) {
            $raw_fac = is_array($_POST['facilities']) ? $_POST['facilities'][0] : $_POST['facilities'];
            $fac_list = explode(',', $raw_fac);
            $stmt_fac = db()->prepare("INSERT INTO facilities (property_id, name) VALUES (?, ?)");
            foreach ($fac_list as $fac) {
                if (trim($fac)) {
                    $stmt_fac->execute([$property_id, trim($fac)]);
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
                    $is_main = ($i === 0) ? 1 : 0;
                    $stmt_img->execute([$property_id, $file_path, $is_main]);
                }
            }
        }

        db()->commit();
        set_flash_message('success', 'Property submitted successfully! It will be LIVE after admin approval.');
        redirect('owner/dashboard.php');

    } catch (Exception $e) {
        db()->rollBack();
        $error = 'Error adding property: ' . $e->getMessage();
    }
}

$page_title = 'Add New Property';
include '../includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                    <div class="card border-0 shadow rounded-4 p-4 p-md-5">
                        <h2 class="h3 mb-4">Add Your Homestay</h2>
                        
                        <?php if($error): ?>
                            <div class="alert alert-danger px-3"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 g-md-4">
                                <div class="col-12 col-md-8">
                                    <label class="form-label fw-bold small">Property Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="e.g. Peaceful Riverside Homestay" required>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label class="form-label fw-bold small">Category</label>
                                    <select name="category" class="form-select" required>
                                        <option value="Homestay">Homestay</option>
                                        <option value="Farm Stay">Farm Stay</option>
                                        <option value="Village Stay">Village Stay</option>
                                        <option value="B&B">B&B</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold small">Description</label>
                                    <textarea name="description" class="form-control" rows="5" placeholder="Tell travelers about your beautiful home..." required></textarea>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-bold small">Location</label>
                                    <input type="text" name="location" class="form-control" placeholder="e.g. Pachmarhi, MP" required>
                                </div>
                                <div class="col-6 col-md-3">
                                    <label class="form-label fw-bold small">Price (₹)</label>
                                    <input type="number" name="price" class="form-control" placeholder="2500" required>
                                </div>
                                <div class="col-6 col-md-3">
                                    <label class="form-label fw-bold small">Rooms</label>
                                    <input type="number" name="rooms" class="form-control" value="1" required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-bold small">Amenities (Comma separated)</label>
                                    <input type="text" name="amenities[]" class="form-control" placeholder="WiFi, AC, Breakfast">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-bold small">Facilities (Comma separated)</label>
                                    <input type="text" name="facilities[]" class="form-control" placeholder="Trekking, Library, Garden">
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold small">Upload Images (Max 12)</label>
                                    <input type="file" name="images[]" class="form-control" multiple accept="image/*" required>
                                    <div class="form-text small mt-2">The first image will be the main display image.</div>
                                </div>

                                <div class="col-12 mt-5">
                                    <hr class="opacity-10">
                                    <div class="row g-2">
                                        <div class="col-12 col-md-auto order-2 order-md-1">
                                            <a href="dashboard.php" class="btn btn-outline-secondary w-100 px-5">Cancel</a>
                                        </div>
                                        <div class="col-12 col-md-auto ms-md-auto order-1 order-md-2">
                                            <button type="submit" class="btn btn-primary-custom w-100 px-5 fw-bold">Submit for Approval</button>
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
