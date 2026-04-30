<?php include 'includes/header.php'; ?>

<style>
    .terms-hero {
        background: linear-gradient(135deg, #1a1a1a 0%, #333333 100%);
        padding: 80px 0;
        color: white;
        margin-bottom: 50px;
        position: relative;
        overflow: hidden;
    }
    .terms-hero::after {
        content: '';
        position: absolute;
        top: -10%;
        left: -5%;
        width: 350px;
        height: 350px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 50%;
    }
    .terms-hero::before {
        content: '';
        position: absolute;
        bottom: -20%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(45, 90, 39, 0.1); /* Subtle Forest Green hint */
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
</style>

<div class="terms-hero">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Terms of Use</h1>
        <p class="lead opacity-75 animate__animated animate__fadeInUp">Website: www.myhomestaymp.com | Effective Date: April 25, 2026</p>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="policy-content">
                <div class="policy-section">
                    <h4>1. Acceptance of Terms</h4>
                    <p>By accessing or using this website, you agree to be bound by these Terms of Use. If you do not agree, please do not use the website. These Terms constitute a legally binding agreement between you and <strong>My Homestay MP</strong>.</p>
                </div>

                <div class="policy-section">
                    <h4>2. Nature of Service</h4>
                    <p>My Homestay MP is an online platform that connects Homestay owners and Travelers/guests. We act only as an intermediary platform and do not own or directly manage properties (unless specifically stated).</p>
                </div>

                <div class="policy-section">
                    <h4>3. User Eligibility</h4>
                    <ul class="list-styled">
                        <li>You must be at least 18 years old</li>
                        <li>You agree to provide accurate and complete information</li>
                        <li>You are responsible for all activities under your account</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>4. User Accounts</h4>
                    <ul class="list-styled">
                        <li>Users may need to register to access certain services</li>
                        <li>You are responsible for maintaining confidentiality of login credentials</li>
                        <li>Any misuse must be reported immediately</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>5. Booking & Payments</h4>
                    <ul class="list-styled">
                        <li>Booking terms are defined by individual homestay owners</li>
                        <li>Payments may include advance deposits or full payment as defined by the host</li>
                        <li>Cancellation and refund policies are also governed by the host (subject to our standard guidelines)</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>6. User Responsibilities</h4>
                    <p>You agree <strong>NOT</strong> to:</p>
                    <ul class="list-styled">
                        <li>Provide false or misleading information</li>
                        <li>Use the platform for illegal purposes</li>
                        <li>Upload harmful, offensive, or abusive content</li>
                        <li>Attempt hacking, data scraping, or system misuse</li>
                    </ul>
                    <p class="text-muted small">Such restrictions are standard across homestay platforms to ensure lawful use.</p>
                </div>

                <div class="policy-section">
                    <h4>7. Content & Listings</h4>
                    <ul class="list-styled">
                        <li>Property details are provided by hosts</li>
                        <li>We do not guarantee the accuracy of listings</li>
                        <li>Users should verify details independently before booking</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>8. Intellectual Property</h4>
                    <p>All website content (text, logo, images) belongs to <strong>My Homestay MP</strong>. Unauthorized copying or reproduction is strictly prohibited.</p>
                </div>

                <div class="policy-section">
                    <h4>9. Third-Party Links</h4>
                    <p>The website may contain links to third-party services. We are not responsible for their content, policies, or services.</p>
                </div>

                <div class="policy-section">
                    <h4>10. Disclaimer</h4>
                    <ul class="list-styled">
                        <li>Services are provided “as is”</li>
                        <li>We do not guarantee uninterrupted or error-free operation</li>
                        <li>We are not responsible for disputes between users and hosts</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>11. Limitation of Liability</h4>
                    <p>My Homestay MP shall not be liable for:</p>
                    <ul class="list-styled">
                        <li>Booking cancellations</li>
                        <li>Property-related issues</li>
                        <li>Loss, damage, or injury during stay</li>
                        <li>Payment disputes between users and hosts</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>12. Indemnity</h4>
                    <p>You agree to indemnify and hold harmless My Homestay MP from any claims arising from your use of the website or violation of these Terms.</p>
                </div>

                <div class="policy-section">
                    <h4>13. Termination</h4>
                    <p>We reserve the right to suspend or terminate accounts, remove content, or restrict access without prior notice.</p>
                </div>

                <div class="policy-section">
                    <h4>14. Changes to Terms</h4>
                    <p>We may update these Terms at any time. Continued use of the website means acceptance of updated Terms.</p>
                </div>

                <div class="policy-section">
                    <h4>15. Governing Law</h4>
                    <p>These Terms shall be governed by the laws of India. Jurisdiction: <strong>Courts of Madhya Pradesh (Bhopal).</strong></p>
                </div>

                <div class="annunciation-box">
                    <h5>Annunciation</h5>
                    <p>The 'My Home Stay M.P.' portal has been created solely for the purpose of promoting the properties of Home Stay Owners. This portal is operated by a registered organization, the <strong>"Home Stay Owners Welfare Society, Madhya Pradesh."</strong></p>
                    
                    <ul class="list-styled mb-0 small">
                        <li>The organization does not charge any commission, fee, or share for any type of booking.</li>
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
