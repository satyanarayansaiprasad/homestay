<?php
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_id = (int)$_POST['property_id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    try {
        // Store in DB
        $stmt = db()->prepare("INSERT INTO enquiries (property_id, name, email, phone, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$property_id, $name, $email, $phone, $message]);

        // Get Property and Owner info for Emails
        $stmt_prop = db()->prepare("SELECT p.title, u.email as owner_email FROM properties p JOIN users u ON p.owner_id = u.id WHERE p.id = ?");
        $stmt_prop->execute([$property_id]);
        $prop_info = $stmt_prop->fetch();

        if ($prop_info) {
            $to_owner = $prop_info['owner_email'];
            $subject = "New Enquiry for " . $prop_info['title'];
            $email_content = "Hello,\n\nYou have a new enquiry for your property: " . $prop_info['title'] . "\n\nFrom: $name\nEmail: $email\nPhone: $phone\nMessage: $message\n\nPlease check your dashboard for details.";
            
            // mail($to_owner, $subject, $email_content); // Standard PHP mail (requires server config)
            // mail(CONTACT_EMAIL, $subject, $email_content); // Notify Admin too
        }

        set_flash_message('success', 'Enquiry sent successfully! The owner will contact you soon.');
        // Redirect back to the property page
        $stmt_slug = db()->prepare("SELECT slug FROM properties WHERE id = ?");
        $stmt_slug->execute([$property_id]);
        $slug = $stmt_slug->fetchColumn();
        
        redirect('property/' . $slug);

    } catch (Exception $e) {
        set_flash_message('danger', 'Error submitting enquiry. Please try again.');
        redirect($_SERVER['HTTP_REFERER'] ?? 'index.php');
    }
} else {
    redirect('index.php');
}
