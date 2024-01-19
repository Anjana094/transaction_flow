<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# About Laravel Transactions API

This Laravel project implements functionality related to financial transactions and calculating balances. Below are the details on how to set up the project, migrate and seed the database, and use the provided API functions.

## Setup

1. Clone the repository:
   ---bash
   git clone https://github.com/Anjana094/transaction_flow.git
   
2. Navigate to the project directory:
   
   cd transaction_flow

3. Install dependencies:
  
   composer install

4. Copy the .env.example file and rename it to .env. Update the database connection details.

5. Generate the application key:

   php artisan key:generate

6. Migrate the database:
   
   php artisan migrate

7. Seed the database:
   
   php artisan db:seed   

8. Database Structure
   
   The transactions table is used to store financial transactions. The initial balance for all users is set to $5.

9. API Functions
    1. Calculate User Transaction After Balance
    
    Endpoint: /api/calculate-transaction-after-balance

    2. Calculate User Closing Balance

    Endpoint: /api/users/{userId}/closing-balance

    3. Calculate Transaction Amount of last 30 Days/15 Days/Weekend:

    Endpoint: /api/calculate-metrics


10. Project Installation
    
    The project is now set up and ready to use. You can run the Laravel development server:
    
    php artisan serve
    
    Visit http://localhost:8000 to access the API endpoints.

Feel free to explore and integrate these API functions into your application!




