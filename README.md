# Support Team Activity Tracker

A professional Laravel-based system designed to track the daily activities of an applications support team.

## 🚀 Features
- **Daily Dashboard**: Real-time view of all support activities and their current status.
- **Activity Tracking**: Ability to update activity status (Done/Pending) with detailed remarks.
- **Audit Trail**: Captures the personnel's bio details and precise timestamps for every update.
- **Handover Log**: A dedicated daily view to manage the transition of pending tasks between shifts.
- **Custom Reporting**: Query activity history across any custom date range.
- **Secure Auth**: Full user authentication system with customized profile management.

## 🛠️ Tech Stack
- **Framework**: Laravel 11
- **Frontend**: Tailwind CSS & Alpine.js
- **Database**: SQLite (Zero-config)
- **Auth**: Laravel Breeze

## 📦 Installation Guide
1. Clone the repository:
   `git clone https://github.com/your-username/activity-tracker.git`
2. Install dependencies:
   `composer install`
   `npm install && npm run build`
3. Setup environment:
   `cp .env.example .env`
   `php artisan key:generate`
4. Setup Database:
   `touch database/database.sqlite`
   `php artisan migrate`
5. Start the server:
   `php artisan serve`
