# Simple Blog System

A basic blog application built with **Laravel 12**, **Livewire**, **Reverb**, and **Tailwind CSS**.

This project is intended for **educational purposes only** and is **not meant for commercial use**.

---

## Features

* User registration and login using **Laravel Breeze**
* Create, edit, and delete blog posts (authenticated users only)
* View all posts with author information
* Leave comments on posts
* Responsive and works in light and dark mode
* Blade templates for reusable layouts
* Policies for authorization
* Pagination of posts
* Real-time comment updates using **Livewire**
* Dashboard showing user’s own posts

---

## Installation

> Requires PHP 8.4+, Composer, Node.js, and Docker (optional but recommended).

1. Clone the repository:

```bash
git clone https://github.com/yourusername/Simple-Blog-System.git
cd Simple-Blog-System
```

2. Install dependencies:

```bash
composer install
npm install
npm run dev
```

3. Copy `.env.example` to `.env` and configure your database and environment variables:

```bash
cp .env.example .env
php artisan key:generate
```

4. Run migrations:

```bash
php artisan migrate
```

5. Start the development server:

```bash
php artisan serve
```

If using Docker, you can use the provided **Dockerfile** and **docker-compose** setup to run the application in a containerized environment.

---

## Usage

* Visit `/register` to create a new user account.
* Visit `/login` to authenticate.
* Access `/dashboard` to manage your posts.
* Create posts via `/post/create`.
* Leave comments under posts.
* Posts and comments update in real time using Livewire.

---

## Notes

* This project is **for learning purposes only**. It is not secured for production use and should not be deployed commercially.
* Some features, like WebSocket broadcasting for comments, may have quirks or rely on local development configurations.
* Dark mode and light mode are supported, but minor UI inconsistencies may exist.

---

## License

This project is provided **as-is** for educational purposes.

Do **not use it commercially**.
