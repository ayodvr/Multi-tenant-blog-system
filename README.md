# Multi-tenant-blog-system

# Setup Instructions

-   Ensure to have Xampp / Localhost running

-   Clone this project by running : git clone https://github.com/ayodvr/Multi-tenant-blog-system.git

-   Install dependencies by running : composer install or composer update

-   Create a new dot ENV file by running: cp .env.example .env

-   Create a new Application key by running: php artisan key:generate

-   Run migrations using: php artisan migrate

-   Seed Admin user by running: php artisan db:seed

-   Run "php artisan serve" to start project

# Scope of project

-   Technical Design: Multi-Tenancy

-   Type: Single Database – Shared Schema with Tenant Scoping

-   All data resides in one database.

-   Each record is scoped using tenant_id (for Posts).

-   Users have roles (admin or tenant).

-   Tenants are linked to users (1-to-1).

-   Admins can view/manage all data.

-   Tenants needs admin approval before logging in.

-   Tenants can only manage their own data and perform CRUD functionalities.

-   The database used for this project is SQLite kindly install the "SQLite 3 Editor" extension from the VsCode Marketplace

-   A postman collection JSON file is also included in the root directory as API documentation guide.

# CRUD functionality using web

-   Registered users can login with their credentials and perform CRUD
-   Admin can see all tenants posts via web
