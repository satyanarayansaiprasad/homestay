<?php 
$pageTitle = 'Add Property';
$activePage = 'add-property';
$mainHeading = 'Add New Property';
$subHeading = 'Fill in the details below to submit your property for approval.';
include '../includes/owner-header.php'; 
?>

<div class="row g-4">
    <!-- Basic Information -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm p-4 mb-4">
            <h5 class="fw-bold mb-4">Basic Information</h5>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-bold small">Property Title</label>
                    <input type="text" class="form-control" placeholder="e.g. Royal Heritage Mansion" required>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold small">Description</label>
                    <textarea class="form-control" rows="5" placeholder="Tell us about the property, history, surroundings..."></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold small">City</label>
                    <select class="form-select">
                        <option selected>Select City</option>
                        <option>Lucknow</option>
                        <option>Agra</option>
                        <option>Varanasi</option>
                        <option>Mathura</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold small">Exact Location / Address</label>
                    <input type="text" class="form-control" placeholder="Street, Area Name">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold small">Price per Night (₹)</label>
                    <input type="number" class="form-control" placeholder="0.00">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold small">Room Size (sq. ft.)</label>
                    <input type="text" class="form-control" placeholder="e.g. 450">
                </div>
            </div>
        </div>

        <!-- Amenities & Facilities -->
        <div class="card border-0 shadow-sm p-4 mb-4">
            <h5 class="fw-bold mb-3">Amenities & Facilities</h5>
            <p class="text-muted small mb-4">Select all that apply to your property.</p>
            <div class="row g-3">
                <?php 
                $amenities = ['Wifi', 'Air Conditioning', 'Breakfast', 'Television', 'Workspace', 'Heater'];
                $facilities = ['Free Parking', 'Kitchen access', 'Swimming Pool', 'Washing Machine', 'Garden', 'Security'];
                ?>
                <div class="col-12 mb-2"><span class="fw-bold small text-primary">Amenities</span></div>
                <?php foreach($amenities as $item): ?>
                <div class="col-md-4 col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="am-<?= strtolower($item) ?>">
                        <label class="form-check-label" for="am-<?= strtolower($item) ?>"><?= $item ?></label>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <div class="col-12 mt-4 mb-2"><span class="fw-bold small text-primary">Facilities</span></div>
                <?php foreach($facilities as $item): ?>
                <div class="col-md-4 col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="fac-<?= strtolower($item) ?>">
                        <label class="form-check-label" for="fac-<?= strtolower($item) ?>"><?= $item ?></label>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Side Cards -->
    <div class="col-lg-4">
        <!-- Image Upload -->
        <div class="card border-0 shadow-sm p-4 mb-4 text-center">
            <h5 class="fw-bold mb-3">Property Images</h5>
            <div class="border-dashed border-2 p-5 rounded-3 bg-light mb-3" style="border-style: dashed !important; border-color: #dee2e6 !important;">
                <i class="fas fa-cloud-upload-alt display-4 text-muted mb-2"></i>
                <h6 class="mb-0">Drag & Drop Images</h6>
                <small class="text-muted">or click to browse</small>
                <input type="file" multiple class="opacity-0 position-absolute" style="width: 100%; height: 100%; top: 0; left: 0; cursor: pointer;">
            </div>
            <p class="small text-muted">Upload at least 3 high-quality images (JPEG, PNG). Max size 5MB each.</p>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <button type="submit" class="btn btn-primary-custom w-100 py-3 mb-3">
                <i class="fas fa-paper-plane me-2"></i> Submit for Approval
            </button>
            <p class="small text-muted text-center mb-0">By submitting, you agree to our <a href="#">Property Guidelines</a>.</p>
        </div>
    </div>
</div>

<?php include '../includes/owner-footer.php'; ?>
