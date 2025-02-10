A-Cube CRM
A-Cube CRM is a lightweight Customer Relationship Management system designed for small-to-medium enterprises (SMEs). It helps businesses manage leads, contacts, tasks, and reports efficiently.

 Features
Leads Management: Track and manage potential customers.
Contacts Management: Store customer details with roles (e.g., HR Manager, Sales Representative).
Search Functionality: Quickly find leads, contacts, and reports.
Reports & Insights: Visual representation of business performance.
Authentication System: Secure login and registration.
User Roles & Permissions: Control access based on user roles.
Dashboard Overview: View key business metrics at a glance.
 Installation
 Clone the Repository

Copy
Edit
git clone https://github.com/your-username/A-Cube-CRM.git
cd A-Cube-CRM
 Install Dependencies

Copy
Edit
composer install
npm install
 Set Up Environment
Copy .env.example and create a new .env file:


Copy
Edit
cp .env.example .env
Then, generate an application key:


Copy
Edit
php artisan key:generate
4 Configure Database
Open .env file and set your database credentials:
env
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=a_cube_crm
DB_USERNAME=root
DB_PASSWORD=
Run migrations and seed data:

Copy
Edit
php artisan migrate --seed
 Start the Application

Copy
Edit
php artisan serve
Visit http://127.0.0.1:8000 in your browser.

 Database Seeding
To generate 30 random leads and contacts, run:


Copy
Edit
php artisan db:seed --class=LeadsSeeder
php artisan db:seed --class=ContactsSeeder
📜 Testing
Run PHPUnit tests to ensure everything is working:


Copy
Edit
php artisan test
 Contributing
Fork the repository.
Create a new branch (git checkout -b feature-branch).
Make your changes.
Commit your changes (git commit -m "Added new feature").
Push to the branch (git push origin feature-branch).
Open a Pull Request.
