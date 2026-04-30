# MyHomestayMP - Homestay Listing & Management System

A full-stack web application designed for Madhya Pradesh Tourism homestays, farm stays, and village stays.

## Features
- **Public Website**: Modern landing page, property listings with filters, and detailed property views with enquiry forms.
- **Owner Panel**: Secure registration, property management (Add/Edit), and dashboard for tracking listings and enquiries.
- **Admin Panel**: Centralized management for property approvals and viewing guest enquiries.
- **SEO Ready**: Slug-based URLs and meta-tag optimizations.
- **Responsive**: Fully responsive design using Bootstrap 5.

## Tech Stack
- **Backend**: Core PHP (PDO, MVC-style routing)
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5, FontAwesome
- **Others**: Session management, Password Hashing, Prepared Statements

## Setup Instructions
1. **Database Setup**:
   - Create a database named `myhomestaymp`.
   - Import the `database.sql` file provided in the root directory.
2. **Configuration**:
   - Open `config/config.php`.
   - Adjust `SITE_URL` to match your local development environment (e.g., `http://localhost/homestay`).
   - Update `DB_USER` and `DB_PASS` if necessary.
3. **Data Seeding (Optional)**:
   - Visit `http://localhost/homestay/seed.php` in your browser to automatically populate the site with dummy properties and an owner account.
4. **Login Credentials**:
   - **Admin**: `admin` / `admin123`
   - **Sample Owner** (after seeding): `owner@example.com` / `owner123`

## Directory Structure
- `/admin`: Administrative panel files.
- `/assets`: CSS, JS, and Images.
- `/config`: Configuration and constants.
- `/includes`: Core DB logic, headers, footers, and helpers.
- `/owner`: Property owner module files.
- `/views`: Public page templates.
- `/uploads`: Dynamically uploaded property images.

## Security Features
- SQL Injection protection via PDO Prepared Statements.
- XSS protection through output escaping.
- Secure session management and password hashing (bcrypt).
