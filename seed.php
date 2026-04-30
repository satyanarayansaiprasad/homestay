<?php
require_once 'includes/db.php';

echo "Seeding database...<br>";

try {
    // 1. Create a dummy owner
    $hashed_pass = password_hash('owner123', PASSWORD_DEFAULT);
    $stmt = db()->prepare("INSERT IGNORE INTO users (name, email, phone, password, status) VALUES ('Rajesh Kumar', 'owner@example.com', '9876543210', ?, 'active')");
    $stmt->execute([$hashed_pass]);
    $owner_id = db()->lastInsertId() ?: 1;

    // 2. Create sample properties
    $properties = [
        [
            'title' => 'The Banyan Grove Homestay',
            'slug' => 'banyan-grove-homestay',
            'desc' => 'Beautiful homestay surrounded by ancient banyan trees. Perfect for bird watchers and peace seekers.',
            'loc' => 'Pachmarhi, MP',
            'price' => 2200,
            'cat' => 'Homestay',
            'status' => 'LIVE'
        ],
        [
            'title' => 'Tiger Trails Farm Stay',
            'slug' => 'tiger-trails-farm-stay',
            'desc' => 'Located near the buffer zone of Bandhavgarh. Experience authentic village life with organic food.',
            'loc' => 'Bandhavgarh, MP',
            'price' => 3500,
            'cat' => 'Farm Stay',
            'status' => 'LIVE'
        ],
        [
            'title' => 'Riverside Retreat Maheshwar',
            'slug' => 'riverside-retreat-maheshwar',
            'desc' => 'Watch the sunset over Narmada from your balcony. Hand-woven Maheshwari fabrics available locally.',
            'loc' => 'Maheshwar, MP',
            'price' => 1800,
            'cat' => 'Village Stay',
            'status' => 'Pending'
        ],
        [
            'title' => 'City Hearts B&B Bhopal',
            'slug' => 'city-hearts-bb-bhopal',
            'desc' => 'Modern B&B in the heart of Bhopal. Close to Lakes and historical sites.',
            'loc' => 'Bhopal, MP',
            'price' => 1500,
            'cat' => 'B&B',
            'status' => 'LIVE'
        ]
    ];

    $stmt_prop = db()->prepare("INSERT IGNORE INTO properties (owner_id, title, slug, description, location, price, category, rooms, status, featured) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($properties as $p) {
        $stmt_prop->execute([
            $owner_id, 
            $p['title'], 
            $p['slug'], 
            $p['desc'], 
            $p['loc'], 
            $p['price'], 
            $p['cat'], 
            rand(1, 4), 
            $p['status'], 
            rand(0, 1)
        ]);
        $prop_id = db()->lastInsertId();
        
        if ($prop_id) {
            // Add dummy images
            $stmt_img = db()->prepare("INSERT INTO property_images (property_id, image_path, is_main) VALUES (?, ?, ?)");
            $stmt_img->execute([$prop_id, 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80', 1]);
            
            // Add dummy amenities
            $stmt_amen = db()->prepare("INSERT INTO amenities (property_id, name) VALUES (?, ?)");
            $stmt_amen->execute([$prop_id, 'WiFi']);
            $stmt_amen->execute([$prop_id, 'Breakfast']);
            
            // Add dummy enquiries
            $stmt_enq = db()->prepare("INSERT INTO enquiries (property_id, name, email, phone, message) VALUES (?, 'Aman Gupta', 'aman@example.com', '9988776655', 'Looking to book for 3 days next week.')");
            $stmt_enq->execute([$prop_id]);
        }
    }

    echo "Successfully seeded dummy data!<br>";
    echo "<b>Login Details:</b><br>";
    echo "Owner: owner@example.com / owner123<br>";
    echo "Admin: admin / admin123 (from database.sql)<br>";

} catch (Exception $e) {
    echo "Seeding failed: " . $e->getMessage();
}
