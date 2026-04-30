<?php include 'includes/header.php'; ?>

<style>
    .policy-hero {
        background: linear-gradient(135deg, var(--secondary) 0%, #a67c52 100%);
        padding: 80px 0;
        color: white;
        margin-bottom: 50px;
        position: relative;
        overflow: hidden;
    }
    .policy-hero::after {
        content: '';
        position: absolute;
        bottom: -20%;
        left: -5%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }
    .policy-content {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        line-height: 1.8;
    }
    .policy-section {
        margin-bottom: 35px;
    }
    .policy-section h4 {
        color: var(--primary);
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--accent);
        display: inline-block;
    }
    .refund-table {
        background: #fdfaf5;
        border-radius: 15px;
        padding: 25px;
        margin: 20px 0;
        border: 1px dashed var(--secondary);
    }
    .refund-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    .refund-item:last-child {
        border-bottom: none;
    }
    .annunciation-box {
        background: #f8fdf8;
        border-left: 5px solid var(--primary);
        padding: 30px;
        border-radius: 0 15px 15px 0;
        margin-top: 50px;
    }
    .annunciation-box h5 {
        color: var(--primary);
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
    }
    .list-styled {
        padding-left: 20px;
    }
    .list-styled li {
        margin-bottom: 10px;
        position: relative;
        list-style: none;
    }
    .list-styled li::before {
        content: "\f00c";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        color: var(--secondary);
        position: absolute;
        left: -25px;
        font-size: 0.8rem;
        top: 5px;
    }
</style>

<div class="policy-hero">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Refund & Cancellation Policy</h1>
        <p class="lead opacity-90 animate__animated animate__fadeInUp">Website: www.myhomestaymp.com | Effective Date: April 25, 2026</p>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="policy-content">
                <div class="policy-section">
                    <h4>1. Introduction</h4>
                    <p>This Refund & Cancellation Policy governs all bookings made through <strong>My Homestay MP</strong>. By making a reservation on our platform, you agree to the terms outlined below.</p>
                </div>

                <div class="policy-section">
                    <h4>2. Nature of Platform</h4>
                    <p>My Homestay MP acts as an intermediary platform connecting guests and homestay owners.</p>
                    <ul class="list-styled">
                        <li>Each host may have their own cancellation policy</li>
                        <li>In case of conflict, the host’s policy will prevail</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>3. Guest Cancellation Policy</h4>
                    <h6 class="fw-bold mt-4">a) Standard Cancellation</h6>
                    <div class="refund-table">
                        <div class="refund-item">
                            <span>15 days or more before check-in</span>
                            <span class="badge bg-success rounded-pill">50% Refund</span>
                        </div>
                        <div class="refund-item">
                            <span>7 to 14 days before check-in</span>
                            <span class="badge bg-warning text-dark rounded-pill">25% Refund</span>
                        </div>
                        <div class="refund-item text-danger fw-bold">
                            <span>Less than 7 days before check-in</span>
                            <span>No Refund</span>
                        </div>
                    </div>
                    <p class="small text-muted">* 50% refund excludes service/payment gateway charges</p>

                    <h6 class="fw-bold mt-4">b) Same-Day / No-Show</h6>
                    <p>No refund will be provided if:</p>
                    <ul class="list-styled">
                        <li>Guest does not check in</li>
                        <li>Guest cancels on the check-in day</li>
                    </ul>

                    <h6 class="fw-bold mt-4">c) Early Departure</h6>
                    <p>No refund will be issued for unused stay after check-in</p>
                </div>

                <div class="policy-section">
                    <h4>4. Host Cancellation</h4>
                    <p>If a homestay owner cancels a confirmed booking:</p>
                    <ul class="list-styled">
                        <li>Guest will receive a full refund</li>
                        <li>Alternative accommodation may be offered (subject to availability)</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>5. Service Fees & Charges</h4>
                    <ul class="list-styled">
                        <li>Platform/Membership/Portal fees are non-refundable</li>
                        <li>Taxes (if applicable) will be adjusted as per law</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>6. Special / Non-Refundable Bookings</h4>
                    <p>Certain bookings may be marked as Non-refundable or Discounted / promotional offers. In such cases: <strong>No refund will be issued under any circumstances.</strong></p>
                </div>

                <div class="policy-section">
                    <h4>7. Refund Eligibility for Issues (During Stay)</h4>
                    <p>Refunds may be considered if:</p>
                    <ul class="list-styled">
                        <li>Property is not as described</li>
                        <li>Booking is not honored</li>
                        <li>Serious safety or hygiene issues exist</li>
                    </ul>
                    <div class="alert alert-secondary border-0 rounded-4 mt-3">
                        <p class="mb-0 small"><strong>Condition:</strong> Issue must be reported within 24 hours of check-in. Supporting proof (photos/videos) may be required.</p>
                    </div>
                </div>

                <div class="policy-section">
                    <h4>10. Non-Refundable Situations</h4>
                    <p>No refund shall be provided in cases of:</p>
                    <ul class="list-styled">
                        <li>Violation of house rules</li>
                        <li>Misconduct or illegal activity</li>
                        <li>Damage to property</li>
                        <li>Dissatisfaction after check-in (non-critical issues)</li>
                        <li>Natural events, travel delays, or personal reasons</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>11. Policy Changes</h4>
                    <p>My Homestay MP reserves the right to modify this policy at any time. Updated terms will be published on this page.</p>
                </div>

                <div class="annunciation-box">
                    <h5>Annunciation</h5>
                    <p>The 'My Home Stay M.P.' portal has been created solely for the purpose of promoting the properties of Home Stay Owners. This portal is operated by a registered organization, the <strong>"Home Stay Owners Welfare Society, Madhya Pradesh."</strong></p>
                    
                    <ul class="list-styled mb-0 small">
                        <li>The organization does not charge any commission, fee, or share from either the guest or the Home Stay Owner for any type of booking.</li>
                        <li>For the updating and maintenance of the website an annual fee of ₹1,000 shall be payable.</li>
                        <li>The entire responsibility for all bookings made through this website lies solely between the Guest and the Home Stay Operator (Property Owner).</li>
                        <li>The organization is not a direct party to any booking, payment, or service-related transaction.</li>
                        <li>The organization shall not be held liable for any instance of fraud, deficiency in service, or dispute of any kind.</li>
                        <li>In the event of any dispute, the organization reserves the right to review the matter and render a final decision.</li>
                        <li>The organization retains the absolute right to list or remove any Home Stay property from the website.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
