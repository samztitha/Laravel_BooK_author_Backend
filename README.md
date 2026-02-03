 Book & Author Management System 

Laravel backend API to manage Authors and their Books.
Includes CRUD for both resources, relationships, and request validation.

Tech
Laravel 10
SQLite (local)

Setup
1.Clone the repo
2.Install dependencies:
   composer install

3.Create env file:
   copy .env.example .env

4.Generate app key:
   php artisan key:generate

5.Create SQLite database file:
   (create an empty file) database/database.sqlite

   In .env:
   DB_CONNECTION=sqlite
   DB_DATABASE="database/database.sqlite"

6.Run migrations:
   php artisan migrate

7.Start server:
   php artisan serve

Base URL: http://127.0.0.1:8000

API Endpoints

 Authors
 GET    /api/authors
 POST   /api/authors
 GET    /api/authors/{id}
 PUT    /api/authors/{id}
 DELETE /api/authors/{id}

 Books
GET    /api/books
POST   /api/books
GET    /api/books/{id}
PUT    /api/books/{id}
DELETE /api/books/{id}

Notes
Author hasMany Books
Book belongsTo Author
Validation applied in store/update requests
