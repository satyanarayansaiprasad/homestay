<?php
require_once 'includes/db.php';

// Simple Router
$request = $_SERVER['REQUEST_URI'];
$base_path = '/development/homestay'; // Adjust this to your base path
$route = str_replace($base_path, '', $request);
$route = parse_url($route, PHP_URL_PATH);
$route = rtrim($route, '/'); // Normalize by removing trailing slash

// Basic Routing Logic
switch ($route) {
    case '/':
    case '':
        $page_title = 'Welcome to MyHomestayMP';
        include 'views/public/home.view.php';
        break;
    
    case '/listings.php':
    case '/listings':
        $page_title = 'Browse Homestays';
        include 'views/public/listings.view.php';
        break;

    case '/about.php':
    case '/about':
        $page_title = 'About Us';
        include 'views/public/about.view.php';
        break;

    case '/social-heads':
        $page_title = 'Social Heads - Leadership';
        include 'views/public/social_heads.view.php';
        break;

    case '/governing-body':
        $page_title = 'Governing Body - Leadership';
        include 'views/public/governing_body.view.php';
        break;

    case '/gallery.php':
    case '/gallery':
        $page_title = 'Visual Gallery';
        include 'views/public/gallery.view.php';
        break;

    case '/contact.php':
    case '/contact':
        $page_title = 'Contact Us';
        include 'views/public/contact.view.php';
        break;

    case '/privacy-policy':
        $page_title = 'Privacy Policy';
        include 'views/public/privacy-policy.view.php';
        break;

    case '/refund-policy':
        $page_title = 'Refund & Cancellation Policy';
        include 'views/public/refund-policy.view.php';
        break;

    case '/terms-of-use':
        $page_title = 'Terms of Use';
        include 'views/public/terms-of-use.view.php';
        break;

    default:
        // Handle Slugs for Property Details or 404
        if (preg_match('~^/property/([^/]+)$~', $route, $matches)) {
            $slug = $matches[1];
            include 'views/public/details.view.php';
        } else {
            http_response_code(404);
            $page_title = 'Page Not Found';
            include 'views/public/404.view.php';
        }
        break;
}
