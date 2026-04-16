<?php 
$pageTitle = 'Schemes & Rules - Madhya Pradesh Tourism';
include 'includes/header.php'; 
?>

<!-- Hero Section -->
<section class="bg-primary-dark py-5">
    <div class="container text-center text-white reveal">
        <h1 class="text-white display-4">Schemes & Regulations</h1>
        <p class="opacity-75 lead">Official registration guidelines by the MP Tourism Board</p>
    </div>
</section>

<!-- The Schemes -->
<section class="section-padding">
    <div class="container">
        <div class="section-title reveal">
            <h2>Approved Schemes</h2>
            <p class="text-muted">Diverse opportunities for property owners in urban and rural areas</p>
        </div>
        <div class="row g-4">
            <!-- Scheme 1 -->
            <div class="col-lg-6 reveal">
                <div class="glass-card p-4 h-100 shadow-sm border-bottom border-accent border-3">
                    <h5 class="fw-bold text-primary mb-3">1. Homestay Establishment Scheme 2010 (Rev. 2018)</h5>
                    <p class="small text-secondary">Providing comfortable Home Stay facilities in urban areas and tourist spots. This allows tourists to experience famed Indian hospitality, cuisine, and traditions by staying with families in the same premises.</p>
                </div>
            </div>
            <!-- Scheme 2 -->
            <div class="col-lg-6 reveal">
                <div class="glass-card p-4 h-100 shadow-sm border-bottom border-accent border-3">
                    <h5 class="fw-bold text-primary mb-3">2. Bed and Breakfast Establishment Scheme 2019</h5>
                    <p class="small text-secondary">Utilizing additional residential space in urban areas where the owner or caretaker resides. Focuses on affordable accommodation and breakfast. Standard hotels/guesthouses are not eligible.</p>
                </div>
            </div>
            <!-- Scheme 3 -->
            <div class="col-lg-6 reveal">
                <div class="glass-card p-4 h-100 shadow-sm border-bottom border-accent border-3">
                    <h5 class="fw-bold text-primary mb-3">3. Farm stay Establishment Scheme 2019</h5>
                    <p class="small text-secondary">Residential buildings situated outside urban boundaries. Tourists experience natural environments, horticulture, agriculture, and animal husbandry in a rustic setting.</p>
                </div>
            </div>
            <!-- Scheme 4 -->
            <div class="col-lg-6 reveal">
                <div class="glass-card p-4 h-100 shadow-sm border-bottom border-accent border-3">
                    <h5 class="fw-bold text-primary mb-3">4. Gram Stay Establishment Scheme 2019</h5>
                    <p class="small text-secondary">Located in Gram Panchayat areas. Homeowners or registered cooperative societies/SHGs provide stays to promote rural culture, employment, and local food experiences.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rules and Regulations -->
<section id="rules" class="section-padding bg-white">
    <div class="container">
        <div class="section-title center text-center reveal">
            <h2>Portal Rules & Regulations</h2>
            <p class="text-muted">Governance guidelines for the Society marketing portal</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-10">
                <div class="row g-3">
                    <?php 
                    $rules = [
                        "Portal is exclusively for MP Tourism Board registered homestays/B&Bs/Farm/Gram units.",
                        "Initial membership fee: INR 1000. Annual portal maintenance fee: INR 1000.",
                        "Uploaded content will be reviewed by administrators before final approval.",
                        "Renewal notifications will be sent 1 month in advance of the 12th month.",
                        "Global promotion at national and international levels via social media.",
                        "Portal management is handled by the Chairman and Secretary only.",
                        "Unregistered units can affiliate if they comply with responsible tourism regulations.",
                        "Content must be updated and managed by the user/owner directly.",
                        "Maximum 12 high-quality images per listing in the specified format.",
                        "Nearby tourist attractions and unique features must be clearly mentioned.",
                        "Property category (Diamond, Gold, Silver) must be clearly displayed.",
                        "Admin reserves the right to remove any misleading or dispute-creating content."
                    ];
                    foreach($rules as $index => $rule): ?>
                    <div class="col-md-6 reveal">
                        <div class="d-flex align-items-start p-3 bg-light rounded shadow-sm border-start border-accent border-3">
                            <div class="bg-primary-custom text-white fw-bold rounded-circle flex-shrink-0 d-flex align-items-center justify-content-center me-3" style="width: 25px; height: 25px; font-size: 0.8rem;">
                                <?= $index + 1 ?>
                            </div>
                            <p class="small mb-0 text-secondary"><?= $rule ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
