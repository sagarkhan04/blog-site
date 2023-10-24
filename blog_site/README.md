## Blog Site

A Web Application for Blog Site using Laravel 10

## Installation

- Clone this repository
```
git clone https://github.com/sagarkhan04/Blog-site.git
```
- Change directory
```
cd Blog_site
```
- Copy .env.example file
```
cp .env.example .env
```
- Install composer
```
composer i
```
- Generate key
```
php artisan key:generate
```
- Update database information in .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_site
DB_USERNAME=root
DB_PASSWORD=123445678
```
- Run migration
```
<!-- php artisan migrate
```
- Seed databse
``` -->
php artisan db:seed
```
- Start server
```
php artisan serve
```
- See the result
```
http://127.0.0.1:8000/
```

## Admin Details
- Admin login url
```
http://127.0.0.1:8000/admin
```
- Admin credential
```
Email:admin@admin.com
Password:admin
```

## Credit

- **[Al Sayeed](https://github.com/alsayeedar/)**
