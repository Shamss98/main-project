# 🛍️ E-Commerce API Project

This is a simple and extensible **E-Commerce API** built with Laravel. The project allows users to browse and purchase products, while admins can manage inventory and orders.

## 🔧 Features

- User registration and authentication (login/register)
- Role-based access: Admin & User
- Admins can:
  - Add, edit, and delete products
  - View and manage all orders
- Users can:
  - Browse product listings
  - Place orders
- Product image upload support
- API responses in JSON format
- Built with Laravel RESTful resource structure

## 🚀 Technologies Used

- Laravel (PHP Framework)
- MySQL (Database)
- RESTful API
- JWT Authentication (optional if implemented)

## 📦 Getting Started

To set up the project locally:

```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
