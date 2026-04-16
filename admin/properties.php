<?php 
$pageTitle = 'Property Management';
$activePage = 'properties';
$mainHeading = 'Property Approvals';
include '../includes/admin-header.php'; 
?>

<!-- Filter Bar -->
<div class="bg-white p-3 rounded shadow-sm mb-4 d-flex justify-content-between align-items-center">
    <div class="d-flex gap-3">
        <button class="btn btn-dark btn-sm">All (460)</button>
        <button class="btn btn-outline-secondary btn-sm">Pending (8)</button>
        <button class="btn btn-outline-secondary btn-sm">LIVE (440)</button>
        <button class="btn btn-outline-secondary btn-sm">Rejected (12)</button>
    </div>
    <div class="input-group input-group-sm w-25">
        <input type="text" class="form-control" placeholder="Search property...">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
    </div>
</div>

<!-- Property Table -->
<div class="bg-white rounded shadow-sm overflow-hidden">
    <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
            <tr class="small text-muted">
                <th class="ps-4">Property Details</th>
                <th>Owner</th>
                <th>Price</th>
                <th>Date Submitted</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $pending = [
                ['title' => 'Riverside Studio', 'city' => 'Lucknow', 'owner' => 'Raja Pratap Singh', 'price' => '3,200', 'date' => 'Oct 15, 2024'],
                ['title' => 'Varanasi Ghat House', 'city' => 'Varanasi', 'owner' => 'Anil Kumar', 'price' => '4,500', 'date' => 'Oct 14, 2024']
            ];
            foreach($pending as $p): ?>
            <tr>
                <td class="ps-4">
                    <div class="d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=100" class="rounded me-3" style="width: 45px; height: 45px; object-fit: cover;">
                        <div>
                            <div class="fw-bold"><?= $p['title'] ?></div>
                            <small class="text-muted"><?= $p['city'] ?></small>
                        </div>
                    </div>
                </td>
                <td><?= $p['owner'] ?></td>
                <td>₹<?= $p['price'] ?></td>
                <td><?= $p['date'] ?></td>
                <td><span class="badge bg-warning text-dark px-3 rounded-pill">Pending</span></td>
                <td class="text-center">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-sm btn-outline-success"><i class="fas fa-check"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i></button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Mock Modal for Review -->
<div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Property Review: Riverside Studio</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800" class="img-fluid rounded mb-3">
                        <h6 class="fw-bold">Description</h6>
                        <p class="small text-muted">Beautiful riverside studio with a balcony overlooking the Gomti river. Modern interiors and close to all major points in Gomti Nagar.</p>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm small">
                            <tr><td class="text-muted">Owner:</td><td>Raja Pratap Singh</td></tr>
                            <tr><td class="text-muted">Contact:</td><td>+91 98765 43210</td></tr>
                            <tr><td class="text-muted">Price:</td><td>₹3,200/night</td></tr>
                            <tr><td class="text-muted">Rooms:</td><td>1 BHK (Studio)</td></tr>
                        </table>
                        <h6 class="fw-bold mt-4">Amenities</h6>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="badge bg-light text-dark border">Wifi</span>
                            <span class="badge bg-light text-dark border">AC</span>
                            <span class="badge bg-light text-dark border">Parking</span>
                        </div>
                        <div class="bg-light p-3 rounded">
                            <label class="form-label small fw-bold">Admin Remarks</label>
                            <textarea class="form-control form-control-sm" rows="3" placeholder="Reason for approval/rejection..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Reject</button>
                <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal">Approve LIVE</button>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/admin-footer.php'; ?>
