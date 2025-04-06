# Quizzy - Interactive Quiz Application

Quizzy is a modern, interactive quiz application built with Laravel and Tailwind CSS. It allows users to take quizzes on various subjects, with support for both text and image-based questions.

## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/quizzy.git
cd quizzy
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install JavaScript dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quizzy
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run migrations and seed the database:
```bash
php artisan migrate --seed
```

8. Create storage link:
```bash
php artisan storage:link
```

9. Compile assets:
```bash
npm run build
```

10. Start the development server:
```bash
php artisan serve
```

