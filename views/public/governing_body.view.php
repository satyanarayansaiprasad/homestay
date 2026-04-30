<?php include 'includes/header.php'; ?>

<section class="py-5 bg-primary-custom text-white text-center">
    <div class="container py-4">
        <h1 class="display-4 fw-bold">Governing Body</h1>
        <p class="lead">The Leadership and visionaries behind MyHomestayMP</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <!-- Core Team Section -->
        <div class="mb-5 text-center">
            <p class="text-uppercase text-secondary fw-bold mb-5 ls-wide small">Our Core Team Leader of Society</p>
            <div class="row g-4 justify-content-center">
                <!-- President -->
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent h-100 member-card">
                        <div class="p-3">
                            <img src="<?php echo url('assets/img/SOCIETY HEADS/SHARAD DIXIT.jpg'); ?>" class="img-fluid rounded shadow-sm mb-4 member-img" alt="Sharad Dixit">
                            <h6 class="fw-bold mb-1">SHARAD DIXIT</h6>
                            <p class="text-primary fw-bold text-uppercase small">President</p>
                        </div>
                    </div>
                </div>
                <!-- Secretary -->
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent h-100 member-card">
                        <div class="p-3">
                            <img src="<?php echo url('assets/img/SOCIETY HEADS/SHUBHAMTIWARI.jpg'); ?>" class="img-fluid rounded shadow-sm mb-4 member-img" alt="Shubham Tiwari">
                            <h6 class="fw-bold mb-1">SHUBHAM TIWARI</h6>
                            <p class="text-primary fw-bold text-uppercase small">Secretary</p>
                        </div>
                    </div>
                </div>
                <!-- Treasurer -->
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent h-100 member-card">
                        <div class="p-3">
                            <img src="<?php echo url('assets/img/SOCIETY HEADS/ASHISH GUPTA.jpg'); ?>" class="img-fluid rounded shadow-sm mb-4 member-img" alt="Ashish Gupta">
                            <h6 class="fw-bold mb-1">ASHISH GUPTA</h6>
                            <p class="text-primary fw-bold text-uppercase small">Treasurer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5 opacity-25">

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr class="text-primary-custom">
                            <th class="p-4 text-center" style="width: 80px;">S.No</th>
                            <th class="p-4">Name</th>
                            <th class="p-4">Designation</th>
                            <th class="p-4">Description / Unit Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $members = [
                            [
                                "name" => "Dr. P.P. Singh",
                                "designation" => "Patron and Source of Inspiration",
                                "description" => "Former Executive Director M.P. Tourism Corporation and Senior Home Stay Owner"
                            ],
                            [
                                "name" => "DR. P.K. SINHA",
                                "designation" => "Patron and Source of Inspiration",
                                "description" => "Former Additional Director Skill and Training M.P. Tourism Board and former Joint Director Dep. Of Animal Husbandry Gov. of M.P."
                            ],
                            [
                                "name" => "Mr. Satyendra Tiwari",
                                "designation" => "Patron and Source of Inspiration",
                                "description" => "Senior Home Stay Owner and well Known Wildlife Activist of India SKAY Home Stay Bandhavgarh National Park Madhya Pradesh"
                            ],
                            [
                                "name" => "Mrs. Lalita Vijay Falke",
                                "designation" => "Vice President",
                                "description" => "The Krishnayan Heritage Lashkar Gwalior Madhya Pradesh"
                            ],
                            [
                                "name" => "Mr. Bhupendra Pawar",
                                "designation" => "Vice President",
                                "description" => "Sun lake Farm Bishankhedi Bhopal Madhya Pradesh"
                            ],
                            [
                                "name" => "Mr. Rushant Dhanvate",
                                "designation" => "Vice President",
                                "description" => "The Palash Home Stay Pench National Park Madhya Pradesh"
                            ],
                            [
                                "name" => "Mr. Brajesh Raj",
                                "designation" => "Joint Secretary",
                                "description" => "Best Home Stay Orchha Madhya Pradesh"
                            ],
                            [
                                "name" => "Mr. Sandeep Uikey",
                                "designation" => "Joint Secretary",
                                "description" => "Palash Van Home Stay Pench National Park Madhya Pradesh"
                            ],
                            [
                                "name" => "Mr. Raghav S. Devsthale",
                                "designation" => "Member",
                                "description" => "Tarangini Farm Maheshwar Madhya Pradesh"
                            ],
                            [
                                "name" => "Mr. Sushant Vakeel",
                                "designation" => "Member",
                                "description" => "Dakbunglow Home Stay Kanha National Park Palash Madhya Pradesh"
                            ]
                        ];

                        foreach ($members as $index => $member):
                        ?>
                        <tr>
                            <td class="p-4 text-center fw-bold text-muted"><?php echo $index + 1; ?></td>
                            <td class="p-4 fw-bold text-dark"><?php echo $member['name']; ?></td>
                            <td class="p-4">
                                <span class="badge bg-success-subtle text-success p-2 px-3 rounded-pill border border-success-subtle">
                                    <?php echo $member['designation']; ?>
                                </span>
                            </td>
                            <td class="p-4 text-secondary small lh-base"><?php echo $member['description']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="mt-5 text-center">
            <p class="text-muted small">Our governing body is committed to the welfare of homestay owners and the promotion of responsible tourism in Madhya Pradesh.</p>
        </div>
    </div>
</section>


<style>
.ls-wide { letter-spacing: 0.1rem; }
.member-img {
    height: clamp(200px, 50vw, 250px);
    width: clamp(200px, 50vw, 250px);
    object-fit: cover;
    object-position: top;
    margin: 0 auto;
}
@media (max-width: 576px) {
    .member-img {
        height: 180px;
        width: 180px;
    }
}
.member-card { transition: transform 0.3s ease; }
.member-card:hover { transform: translateY(-5px); }
</style>

<?php include 'includes/footer.php'; ?>
