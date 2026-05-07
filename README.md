# Blog Management System

A full-stack, responsive Blog Management System built with Laravel, featuring a minimalist Medium-style frontend, a complete admin dashboard, and dynamic AJAX-based filtering.

## Features

**1. Frontend (User Side)**
- **Responsive Modern UI**: A clean, minimalist design resembling professional blogging platforms like Medium.
- **Dynamic Blog Listing**: All blogs are dynamically fetched from the database using Laravel.
- **Blog Detail Page**: Immersive reading experience with proper typography and layout.
- **AJAX Filtering & Search**: 
  - Filter blogs by Category (instant pill navigation).
  - Search blogs by title seamlessly.
  - Sort blogs by Latest/Oldest.
  - All filtering and pagination happen without any page reload using jQuery and AJAX.

**2. Admin Panel**
- **Secure Authentication**: Built-in login system for the administrator.
- **Blog Management (CRUD)**: 
  - Add new blogs (with a rich-text WYSIWYG editor).
  - Edit existing blogs.
  - Delete blogs.
  - Manage images, categories, content, and titles effortlessly.

## Technologies Used

- **Backend**: PHP 8.x, Laravel 11.x
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, Bootstrap 5 (Responsive Layout)
- **JavaScript**: jQuery, AJAX (for asynchronous filtering)
- **Editor**: TinyMCE (Rich text editor for admin)

## Setup Instructions

If you wish to run this project locally on your machine, follow these steps:

### Prerequisites
- PHP >= 8.2
- Composer
- XAMPP / MySQL
- Node.js & NPM

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone <your-github-repo-link>
   cd laravel-blog-assignment
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript Dependencies**
   ```bash
   npm install
   npm run build
   ```

4. **Environment Setup**
   Copy the example `.env` file and generate an application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Configuration**
   Open your `.env` file and set up your MySQL database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=blog_management
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   *Make sure you have created a database named `blog_management` in phpMyAdmin.*

6. **Run Migrations and Seeders**
   This will create the necessary tables and populate the database with default categories and an admin user.
   ```bash
   php artisan migrate --seed
   ```
   **Default Admin Credentials:**
   - **Email:** admin@gmail.com
   - **Password:** admin123

7. **Link Storage**
   To ensure images display correctly:
   ```bash
   php artisan storage:link
   ```

8. **Start the Development Server**
   ```bash
   php artisan serve
   ```
   Visit `http://127.0.0.1:8000` in your browser.

## Deployment Notes
This application is fully compatible with free hosting platforms such as InfinityFree, 000webhost, and Render. Please refer to the specific platform's Laravel deployment guide for hosting configurations.
