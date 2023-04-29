# Growmodo Test Backend

This is the Laravel backend for the Growmodo Test project. The frontend UI for this backend can be found at the following repository: https://github.com/mangao05/growmodo-test-frontend

## Requirements

- PHP >= 7.4
- Composer
- MySQL or MariaDB
- Laravel >= 8.x

## Installation

1. Clone the repository:
```
git clone https://github.com/mangao05/growmodo-test-backend.git
```

2. Change directory to the project folder:
```
cd growmodo-test-backend
```
3. Install the dependencies:
```
composer install
```

4. Copy the `.env.example` file to `.env`:
```
cp .env.example .env
```

5. Update the `.env` file with your database credentials.

6. Generate an application key:
```
php artisan key:generate
```

7. Run the database migrations:
```
php artisan migrate
```
## Seeding the Database

Seed the database with the default user:
```
php artisan db:seed --class=UserSeeder
```

This command will create a default user with the following credentials:

- Email: admin@test.com
- Password: password

## Logging In

To log in to the Growmodo Test Backend, use the following credentials:

- Email: admin@test.com
- Password: password
