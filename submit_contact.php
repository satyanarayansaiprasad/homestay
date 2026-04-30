<?php
require_once 'includes/db.php';

// Check if PHPMailer is available
$autoload_path = 'vendor/autoload.php';
$use_phpmailer = false;

if (file_exists($autoload_path)) {
    require_once $autoload_path;
    $use_phpmailer = true;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $name = $first_name . ' ' . $last_name;

    try {
        // 1. Store in Database (Priority)
        $stmt = db()->prepare("INSERT INTO enquiries (property_id, name, email, phone, message) VALUES (NULL, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $message]);

        // 2. Prepare Email Content
        $subject = "New Contact Website Form: $name";
        $email_content = "Hello Admin,\n\nYou have a new general inquiry from the website.\n\nFrom: $name\nEmail: $email\nPhone: $phone\nMessage: $message";
        $admin_email = 'myhomestaymp@gmail.com';

        $mail_sent = false;

        // 3. Attempt to send email
        if ($use_phpmailer && class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $admin_email;
                $mail->Password = 'jnjk tiis gywq fjdm'; // App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom($admin_email, 'MyHomestayMP Contact Form');
                $mail->addAddress($admin_email);
                $mail->addReplyTo($email, $name);

                $mail->isHTML(false);
                $mail->Subject = $subject;
                $mail->Body = $email_content;

                $mail->send();
                $mail_sent = true;
            } catch (PHPMailerException $e) {
                error_log("PHPMailer Error: " . $e->getMessage());
            } catch (\Exception $e) {
                error_log("General Mailer Error: " . $e->getMessage());
            }
        } 
        
        // Fallback to native mail() if PHPMailer failed or is unavailable
        if (!$mail_sent) {
            $headers = "From: " . $admin_email . "\r\n";
            $headers .= "Reply-To: " . $email . "\r\n";
            $mail_sent = @mail($admin_email, $subject, $email_content, $headers);
        }

        set_flash_message('success', 'Thank you for contacting us! We have received your message and will get back to you soon.');
        redirect('contact');

    } catch (\Throwable $e) {
        error_log("Contact Form Error: " . $e->getMessage());
        set_flash_message('danger', 'There was a problem submitting your request. Please try again or contact us via phone.');
        redirect('contact');
    }
} else {
    redirect('contact');
}
