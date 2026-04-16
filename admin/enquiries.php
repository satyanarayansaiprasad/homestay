<?php 
$pageTitle = 'Visitor Enquiries';
$activePage = 'enquiries';
$mainHeading = 'Visitor Enquiries';
include '../includes/admin-header.php'; 
?>

<!-- Enquiries Table -->
<div class="bg-white rounded shadow-sm overflow-hidden">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Recent Enquiries</h5>
        <div class="d-flex gap-2">
            <input type="text" class="form-control form-control-sm" placeholder="Search by name/email">
            <button class="btn btn-dark btn-sm"><i class="fas fa-filter"></i></button>
        </div>
    </div>
    <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
            <tr class="small text-muted">
                <th class="ps-4">Visitor</th>
                <th>Contact Info</th>
                <th>Property</th>
                <th>Owner</th>
                <th>Date Received</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $enquiries = [
                ['name' => 'Amit Sharma', 'email' => 'amit@gmail.com', 'phone' => '+91 9123456789', 'property' => 'The Grand Nawab', 'owner' => 'Raja Pratap Singh', 'date' => 'Oct 16, 2024, 10:30 AM'],
                ['name' => 'Sarah Jones', 'email' => 'sarah@example.com', 'phone' => '+44 7712345678', 'property' => 'Ganges View', 'owner' => 'Anil Kumar', 'date' => 'Oct 15, 2024, 04:15 PM'],
                ['name' => 'Michael Chen', 'email' => 'mchen@domain.au', 'phone' => '+61 412345678', 'property' => 'Taj Heritage', 'owner' => 'Sunil Gupta', 'date' => 'Oct 15, 2024, 11:20 AM']
            ];
            foreach($enquiries as $e): ?>
            <tr>
                <td class="ps-4">
                    <div class="fw-bold"><?= $e['name'] ?></div>
                    <div class="small text-muted">Visitor</div>
                </td>
                <td>
                    <div class="small"><?= $e['email'] ?></div>
                    <div class="small"><?= $e['phone'] ?></div>
                </td>
                <td><a href="#" class="text-decoration-none fw-bold"><?= $e['property'] ?></a></td>
                <td><?= $e['owner'] ?></td>
                <td class="small text-muted"><?= $e['date'] ?></td>
                <td class="text-center">
                    <button class="btn btn-sm btn-light text-primary" data-bs-toggle="offcanvas" data-bs-target="#enquiryDetail"><i class="fas fa-eye me-1"></i> View</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Offcanvas for Detail View -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="enquiryDetail" style="width: 500px;">
    <div class="offcanvas-header bg-primary-custom text-white">
        <h5 class="offcanvas-title">Enquiry Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-4">
        <div class="mb-4">
            <h6 class="text-muted small fw-bold text-uppercase">Visitor Information</h6>
            <div class="p-3 bg-light rounded">
                <p class="mb-1 fw-bold">Amit Sharma</p>
                <p class="mb-1 small text-muted"><i class="fas fa-envelope me-2"></i> amit@gmail.com</p>
                <p class="mb-0 small text-muted"><i class="fas fa-phone me-2"></i> +91 9123456789</p>
            </div>
        </div>
        
        <div class="mb-4">
            <h6 class="text-muted small fw-bold text-uppercase">Property Information</h6>
            <div class="p-3 bg-light rounded">
                <p class="mb-1 fw-bold">The Grand Nawab Residence</p>
                <p class="mb-0 small text-muted">Owner: Raja Pratap Singh</p>
            </div>
        </div>

        <div class="mb-4">
            <h6 class="text-muted small fw-bold text-uppercase">Message</h6>
            <div class="p-3 border rounded">
                <p class="small mb-0">"Hello, I am interested in booking your property for 3 nights from Nov 1st. Is it available? Also, do you provide airport pickup?"</p>
            </div>
        </div>

        <div class="mt-5">
            <button class="btn btn-accent-custom w-100 mb-3">Notify Owner Again</button>
            <button class="btn btn-outline-secondary w-100">Archive Enquiry</button>
        </div>
    </div>
</div>

<?php include '../includes/admin-footer.php'; ?>
