<?php include 'includes/header.php'; ?>

<style>
    .privacy-hero {
        background: linear-gradient(135deg, var(--primary) 0%, #1e3d1a 100%);
        padding: 80px 0;
        color: white;
        margin-bottom: 50px;
        position: relative;
        overflow: hidden;
    }
    .privacy-hero::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.05);
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

<div class="privacy-hero">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Privacy Policy</h1>
        <p class="lead opacity-75 animate__animated animate__fadeInUp">Website: www.myhomestaymp.com | Effective Date: April 25, 2026</p>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="policy-content">
                <div class="policy-section">
                    <h4>1. Introduction</h4>
                    <p>Welcome to <strong>My Home stay MP</strong>. We respect your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, and safeguard your data when you use our website and services.</p>
                </div>

                <div class="policy-section">
                    <h4>2. Information We Collect</h4>
                    <p>We may collect the following types of information:</p>
                    
                    <div class="mb-4">
                        <h6 class="fw-bold text-dark">a) Personal Information</h6>
                        <ul class="list-styled">
                            <li>Name</li>
                            <li>Phone number</li>
                            <li>Email address</li>
                            <li>Address</li>
                            <li>ID proof (if required for booking/legal compliance)</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold text-dark">b) Booking Information</h6>
                        <ul class="list-styled">
                            <li>Guest Inquiry details</li>
                            <li>Guest information</li>
                            <li>Payment details</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold text-dark">c) Technical Data</h6>
                        <ul class="list-styled">
                            <li>IP address</li>
                            <li>Browser type</li>
                            <li>Device information</li>
                            <li>Cookies and usage data</li>
                        </ul>
                    </div>
                    <p class="text-muted small italic">This is standard practice across homestay platforms, where both user-provided and automatic data are collected for service delivery.</p>
                </div>

                <div class="policy-section">
                    <h4>3. How We Use Your Information</h4>
                    <p>We use your data to:</p>
                    <ul class="list-styled">
                        <li>Process bookings and reservations</li>
                        <li>Communicate with guests and hosts</li>
                        <li>Provide customer support</li>
                        <li>Improve website performance</li>
                        <li>Comply with legal requirements</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>4. Sharing of Information</h4>
                    <p>We may share your information with:</p>
                    <ul class="list-styled">
                        <li>Homestay owners/hosts</li>
                        <li>Payment service providers</li>
                        <li>Government authorities (if required by law)</li>
                    </ul>
                    <div class="alert alert-info border-0 rounded-4">
                        <i class="fas fa-shield-alt me-2"></i> We do not sell your personal data to third parties.
                    </div>
                </div>

                <div class="policy-section">
                    <h4>5. Data Security</h4>
                    <p>We use appropriate security measures such as:</p>
                    <ul class="list-styled">
                        <li>Secure servers</li>
                        <li>Encryption (SSL)</li>
                        <li>Restricted data access</li>
                    </ul>
                    <p class="text-muted small">These practices align with standard data protection methods used in similar platforms.</p>
                </div>

                <div class="policy-section">
                    <h4>6. Cookies Policy</h4>
                    <p>Our website uses cookies to enhance user experience and analyze website traffic. You can disable cookies through your browser settings.</p>
                </div>

                <div class="policy-section">
                    <h4>7. Data Retention</h4>
                    <p>We retain your information only as long as necessary for:</p>
                    <ul class="list-styled">
                        <li>Booking services</li>
                        <li>Legal compliance</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>8. Your Rights</h4>
                    <p>You have the right to:</p>
                    <ul class="list-styled">
                        <li>Access your data</li>
                        <li>Correct your information</li>
                        <li>Request deletion of your data</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h4>9. Third-Party Links</h4>
                    <p>Our website may contain links to external websites. We are not responsible for their privacy practices.</p>
                </div>

                <div class="policy-section">
                    <h4>10. Changes to This Policy</h4>
                    <p>We may update this Privacy Policy from time to time. Changes will be posted on this page.</p>
                </div>

                <div class="policy-section">
                    <h4>11. Contact Us</h4>
                    <div class="bg-light p-4 rounded-4">
                        <p class="mb-2">For any privacy-related queries:</p>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><strong>Email:</strong> <a href="mailto:myhomestaymp@gmail.com" class="text-primary-custom">myhomestaymp@gmail.com</a>, <a href="mailto:homestaywamp@gmail.com" class="text-primary-custom">homestaywamp@gmail.com</a></li>
                            <li class="mb-2"><strong>Phone:</strong> 7974262399, 9589853911</li>
                            <li><strong>Address:</strong> 1277 NISHAT COLONY HOUSING BOARD M.L. NAGAR BHOPAL M.P.</li>
                        </ul>
                    </div>
                </div>

                <div class="annunciation-box">
                    <h5>Annunciation</h5>
                    <p>The 'My Home Stay M.P.' portal has been created solely for the purpose of promoting the properties of Home Stay Owners. This portal is operated by a registered organization, the <strong>"Home Stay Owners Welfare Society, Madhya Pradesh."</strong></p>
                    
                    <ul class="list-styled mb-0 small">
                        <li>This platform serves merely as a support system / promotional platform.</li>
                        <li>The organization does not charge any commission, fee, or share from either the guest or the Home Stay Owner for any type of booking.</li>
                        <li>This platform is available exclusively to Home Stay Owners who have obtained membership with the organization.</li>
                        <li>To obtain membership, it is mandatory to own a registered Home Stay property.</li>
                        <li>For the updating and maintenance of the website an annual fee of ₹1,000 (One Thousand Rupees) shall be payable.</li>
                        <li>The entire responsibility for all bookings made through this website lies solely between the Guest and the Home Stay Operator (Property Owner).</li>
                        <li>The organization is not a direct party to any booking, payment, or service-related transaction.</li>
                        <li>The organization functions merely as an intermediary / promotional platform.</li>
                        <li>The organization shall not be held liable for any instance of fraud, deficiency in service, or dispute of any kind.</li>
                        <li>If a Home Stay Operator engages in fraudulent activity or improper conduct toward a guest, the entire responsibility for such actions shall rest with the concerned Home Stay Operator.</li>
                        <li>In the event of any dispute, the organization reserves the right to review the matter and render a final decision.</li>
                        <li>The organization retains the absolute right to list or remove any Home Stay property from the website.</li>
                        <li>The organization reserves the right to amend these terms and conditions from time to time.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
