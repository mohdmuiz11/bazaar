# IIUM Online Bazaar System
A web application for online bazaar system using Laravel framework.

## What's this?
A Shopee-like system for IIUM students, lecturers and staff. All inventories, orders, packaging and delivery are handled by this system *(hopefully)*. 

## Plugin used
- Laratrust
- Laravel Breeze

## How to setup this project
1. Download and install XAMPP (or MAMP for macOS): https://www.apachefriends.org/download.html.
2. Download and install composer here: https://getcomposer.org/. If asked for command-line PHP, link the PHP in your XAMPP directory (usually in `C:\xampp\php\php.exe`)
3. Download ZIP this repository or `git clone https://github.com/mohdmuiz11/bazaar.git` (or use GitHub Desktop or through Visual Studio Code).
4. Go to the project folder. (tips: use Visual Studio Code or Notepad++)
5. Go to command prompt/terminal and type: `composer install` and `composer dump-autoload`.
6. Duplicate `.env.example`, rename it to `.env`, then `php artisan key:generate`
7. Start XAMPP, then in your browser, go to https://localhost/phpmyadmin/ and create new database called 'bazaar'.
8. Then, in cmd, type `php artisan migrate` and then `php artisan db:seed`.
9. Finally, do `php artisan serve` and connect to: https://127.0.0.1:8000

Congratulation, you've succesfully setting up this project! If you want to stop the server, just Ctrl+C in the cmd, and stop XAMPP. To re-run the server, just do step 8 only. Enjoy!

## Project Information
### Group Members
NAME                 | MATRIC NO | USERNAME
-------------------- | --------- | ----
Mohammad Mu'izzuddin | 1918855   | @mohdmuiz11
Asyraf Azman         | 1917565   | @ashjeman
Imran Haqeem         | 1910387   | <!-- isilah sendiri lmao -->
Naqib Syahmi         | 1910147   | <!-- isilah sendiri lmao -->

&nbsp;

**LECTURER:** ASST. PROF. DR. ZAINATUL SHIMA BINTI ABDULLAH

**INFO 2303** - Database Programming (Section 1)
