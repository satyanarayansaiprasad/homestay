<?php
include 'includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container text-center">
        <!-- Section 1: State Tourism Department -->
        <div class="mb-5">
            <h1 class="fw-bold mb-4">STATE TOURISM DEPARTMENT</h1>
            <p class="text-uppercase text-secondary fw-bold mb-5 ls-wide small">Our Respected Tourism Administrator</p>

            <div class="row g-4 justify-content-center">
                <!-- Administrator 1 -->
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent h-100">
                        <div class="p-3">
                            <img src="<?php echo url('assets/img/SOCIETY HEADS/DS Lodhi.jpg'); ?>"
                                class="img-fluid rounded shadow-sm mb-4 member-img" alt="DS Lodhi">
                            <h6 class="fw-bold mb-2">Shri Dharmendra Singh LODHI</h6>
                            <p class="small text-muted text-uppercase mb-0">Minister (Independent Charge), Tourism,
                                Culture, Religious Trusts and Endowments Department</p>
                        </div>
                    </div>
                </div>
                <!-- Administrator 2 -->
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent h-100">
                        <div class="p-3">
                            <img src="<?php echo url('assets/img/SOCIETY HEADS/DR IlayaRaja.jpg'); ?>"
                                class="img-fluid rounded shadow-sm mb-4 member-img" alt="DR IlayaRaja">
                            <h6 class="fw-bold mb-2">DR. ILAYARAJA T. I.A.S.</h6>
                            <p class="small text-muted text-uppercase mb-0">Secretary Tourism Gov. Madhya Pradesh and
                                M.D. Madhya Pradesh Tourism Board</p>
                        </div>
                    </div>
                </div>
                <!-- Administrator 3 -->
                <div class="col-md-4">
                    <div class="card border-0 bg-transparent h-100">
                        <div class="p-3">
                            <img src="<?php echo url('assets/img/SOCIETY HEADS/ABHAY ARVIND BEDEKAR.jpg'); ?>"
                                class="img-fluid rounded shadow-sm mb-4 member-img" alt="Abhay Arvind Bedekar">
                            <h6 class="fw-bold mb-2">Dr. ABHAY ARVIND BEDEKAR (I.A.S.)</h6>
                            <p class="small text-muted text-uppercase mb-0">A.M.D. Madhya Pradesh Tourism Board</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5 opacity-25">

        <!-- Section 2: Guides & Inspiration -->
        <div class="mb-5">
            <p class="text-uppercase text-secondary fw-bold mb-5 ls-wide small">Our Guide and Source of Inspiration</p>
            <div class="row g-5 justify-content-center">
                <!-- Guide 1 -->
                <div class="col-md-5">
                    <div class="card border-0 bg-transparent h-100">
                        <div class="p-3">
                            <img src="<?php echo url('assets/img/SOCIETY HEADS/Dr. manoj singh.jpg'); ?>"
                                class="img-fluid rounded shadow-sm mb-4 member-img-large" alt="Dr Manoj Singh">
                            <h6 class="fw-bold mb-2">DR. D.P. SINGH</h6>
                            <p class="small text-muted text-uppercase mb-0 px-md-4">
                                Director Skill and Training<br>
                                M.P. Tourism Board ,Bhopal M.P.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Guide 2 -->
                <div class="col-md-5">
                    <div class="card border-0 bg-transparent h-100">
                        <div class="p-3">
                            <img src="<?php echo url('assets/img/SOCIETY HEADS/Dr. manoj singh.jpg'); ?>"
                                class="img-fluid rounded shadow-sm mb-4 member-img-large" alt="Dr Manoj Singh">
                            <h6 class="fw-bold mb-2">DR. MANOJ KUMAR SINGH</h6>
                            <p class="small text-muted text-uppercase mb-0 px-md-4">
                                Former Director Skill and Training Madhya Pradesh Tourism Board Bhopal.<br>
                                Director Skill Higher Education Gov. of M.P.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Guide 3 -->
                <div class="col-md-5">
                    <div class="card border-0 bg-transparent h-100">
                        <div class="p-3">
                            <img src="<?php echo url('assets/img/SOCIETY HEADS/pK sinha.jpg'); ?>"
                                class="img-fluid rounded shadow-sm mb-4 member-img-large" alt="P.K. Sinha">
                            <h6 class="fw-bold mb-2">DR. P.K. SINHA</h6>
                            <p class="small text-muted text-uppercase mb-0 px-md-4">
                                Former Joint Director Skill and Training Madhya Pradesh Tourism Board Bhopal.<br>
                                Former Joint Director Department of Animal Husbandry Gov. of M.P.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Guide 4 -->
                <div class="col-md-5">
                    <div class="card border-0 bg-transparent h-100">
                        <div class="p-3">
                            <img src="<?php echo url('assets/img/SOCIETY HEADS/PC.jpeg'); ?>"
                                class="img-fluid rounded shadow-sm mb-4 member-img-large" alt="P.K. Sinha">
                            <h6 class="fw-bold mb-2">Shri Prashant Chhirolya</h6>
                            <p class="small text-muted text-uppercase mb-0 px-md-4">
                                Former Advisor Skill and Training , M.P. Tourism Board ,Bhopal M.P. <br>
                                Advisor Technical Education Board Bhopal M.P.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<style>
    .ls-wide {
        letter-spacing: 0.1rem;
    }

    .member-img {
        height: clamp(200px, 50vw, 250px);
        width: clamp(200px, 50vw, 250px);
        object-fit: cover;
        object-position: top;
        margin: 0 auto;
    }

    .member-img-large {
        height: clamp(220px, 60vw, 280px);
        width: clamp(220px, 60vw, 280px);
        object-fit: cover;
        object-position: top;
        margin: 0 auto;
    }

    @media (max-width: 576px) {

        .member-img,
        .member-img-large {
            height: 180px;
            width: 180px;
        }
    }

    .card {
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }
</style>

<?php include 'includes/footer.php'; ?>