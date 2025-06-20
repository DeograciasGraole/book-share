<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book-Share – Laravel Project</title>
</head>
<body>

  <h1>📚 Book-Share – Laravel Project</h1>

  <h2>📝 Overview</h2>
  <p>
    <strong>Book-Share</strong> is a simple web application built with Laravel. The main goal of this project is to practice and understand core Laravel concepts, specifically:
  </p>
  <ul>
    <li>✅ CRUD (Create, Read, Update, Delete) operations</li>
    <li>🔗 Eloquent relationships (One-to-Many, Many-to-Many, etc.)</li>
    <li>⚙️ Laravel routing, controllers, migrations, and Blade templating</li>
  </ul>
  <p>This is a learning-focused project and serves as a foundation for building more advanced Laravel applications.</p>

  <h2>💡 Features</h2>
  <ul>
    <li>📖 Add, edit, view, and delete books</li>
    <li>👤 Manage users (or authors) who share books</li>
    <li>🔁 Model relationships (e.g. each book belongs to a user)</li>
    <li>🧩 Simple and clean UI using Laravel Blade</li>
    <li>🗃️ SQLite database integration (or MySQL if preferred)</li>
  </ul>

  <h2>🛠️ Technologies Used</h2>
  <ul>
    <li>⚙️ Laravel 11 (or your version)</li>
    <li>🐘 PHP 8.x</li>
    <li>🛢️ SQLite (or MySQL)</li>
    <li>🎨 Blade templating</li>
    <li>🧪 Laravel Artisan & Migrations</li>
  </ul>

  <h2>📂 Installation</h2>
  <ol>
    <li>Clone the project:
      <pre><code>git clone https://github.com/your-username/book-share.git
cd book-share</code></pre>
    </li>
    <li>Install dependencies:
      <pre><code>composer install</code></pre>
    </li>
    <li>Set up your <code>.env</code> file:
      <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
    </li>
    <li>Configure the database (for SQLite):
      <pre><code>DB_CONNECTION=sqlite
DB_DATABASE=${DB_DATABASE_PATH}/database.sqlite</code></pre>
      Then create the SQLite file:
      <pre><code>touch database/database.sqlite</code></pre>
    </li>
    <li>Run migrations:
      <pre><code>php artisan migrate</code></pre>
    </li>
    <li>Start the server:
      <pre><code>php artisan serve</code></pre>
    </li>
  </ol>
  <p>Visit <a href="https://book-share.fly.dev/books" target="_blank">book-share</a> in your browser 🧑‍💻</p>

  <h2>🧠 Learning Objectives</h2>
  <ul>
    <li>✅ Using Eloquent relationships (like <code>hasMany</code>, <code>belongsTo</code>)</li>
    <li>✏️ Creating models, controllers, and views</li>
    <li>🔁 Performing CRUD operations</li>
    <li>🧭 Routing and route-model binding</li>
    <li>🛠️ Environment and database configuration</li>
  </ul>

  <h2>📸 Screenshots</h2>
  <p><em>(Optional: Add screenshots of the interface here)</em></p>

  <h2>🤝 Contributing</h2>
  <p>This is a personal learning project, but feel free to fork it if you're learning Laravel too!</p>

  <h2>📄 License</h2>
  <p>This project is licensed under the MIT License.</p>

  <h2>📬 Contact</h2>


</body>
</html>
