Sri Lankan Resort Web System
This is a monorepo for a resort villa and restaurant web system tailored for a Sri Lankan resort. It includes a Laravel 12 backend and a Next.js 15 frontend, providing a complete solution for villa bookings, restaurant menu management, and user authentication.
Structure

backend/: Laravel 12 API with Sanctum authentication, multilingual support, and email notifications.
frontend/: Next.js 15 frontend with SSR, Tailwind CSS, NextAuth.js, and multilingual support.

Prerequisites

PHP 8.2+, Composer
Node.js 18+, npm
MySQL
Git
GitHub account

Backend Setup

Navigate to the backend:cd backend


Install dependencies:composer install


Copy .env.example to .env and configure database/mail settings:cp .env.example .env
php artisan key:generate


Run migrations and seed the database:php artisan migrate --seed


Start the server:php artisan serve --port=8000



Frontend Setup

Navigate to the frontend:cd frontend


Install dependencies:npm install


Copy .env.example to .env.local and set the backend API URL:cp .env.example .env.local


Start the development server:npm run dev



Features

Backend:
RESTful APIs for villas, bookings, and menu items
Sanctum-based authentication
Multilingual support (English, Sinhala, Tamil)
Email notifications for bookings
Sample data for Sri Lankan villas and cuisine


Frontend:
SEO-optimized with SSR
Responsive design with Tailwind CSS
Authentication with NextAuth.js
Language switcher for English, Sinhala, Tamil
Booking history and menu browsing



Deployment

Backend: Deploy on Laravel Forge or AWS EC2 with Nginx/PHP-FPM.
Frontend: Deploy on Vercel for SSR and static site generation.
Set environment variables for production URLs.

License
MIT License
