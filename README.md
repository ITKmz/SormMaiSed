# SormMaiSed

SormMaiSed is a Laravel project created for a Database subject. It is a system designed for maintenance and servicing of IT equipment, with the ability to track results.

## Prerequisites

- XAMPP installed (for Apache and MySQL).
- Composer installed (for PHP dependencies).
- Node.js and npm installed (for frontend dependencies).

## How to Run

1. **Start XAMPP**:

   - Open XAMPP and start the `Apache` and `MySQL` services.
2. **Set up the database**:

   - Open your browser and go to `http://localhost/phpmyadmin`.
   - Create a new database (e.g., `sormmaised`).
3. **Install dependencies**:

   - Run the following commands in the terminal:
     ```bash
     composer install
     npm install
     ```
4. **Set up the environment file**:

   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your database details:
     ```
     DB_DATABASE=sormmaised
     DB_USERNAME=root
     DB_PASSWORD=
     ```
5. **Run database migrations**:

   - Execute the following command to set up the database tables:
     ```bash
     php artisan migrate
     ```
6. **Seed the database (optional)**:

   - If you want to populate the database with mock data, run:
     ```bash
     php artisan db:seed
     ```
7. **Run the development server**:

   - Start the Laravel development server:
     ```bash
     php artisan serve
     ```
8. **Compile assets**:

   - Build the frontend assets:
     ```bash
     npm run dev
     ```
9. **Access the system**:

   - Open your browser and go to `http://localhost:8000`.

Now you can use the SormMaiSed system!
