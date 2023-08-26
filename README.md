# Blog API Project

This project implements a simple API for managing blog posts using Laravel. It includes CRUD operations for blog posts and proper authorization to ensure that only authenticated users can perform certain actions.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/muhamed3li/blog-api.git
   cd blog-api
   ```

2. Install dependencies:

   ```bash
   composer install
   ```

3. Create a copy of the `.env.example` file and name it `.env`. Configure the database connection and other necessary settings in the `.env` file:

   ```bash
   cp .env.example .env
   ```

4. Generate an application key:

   ```bash
   php artisan key:generate
   ```

5. Run database migrations:

   ```bash
   php artisan migrate
   ```

6. (Optional) Seed the database with sample users:

   ```bash
   php artisan db:seed --class=UserSeeder
   ```

7. (Optional) Seed the database with sample posts:

   ```bash
   php artisan db:seed --class=PostSeeder 
   ```

## Usage

1. Start the development server:

   ```bash
   php artisan serve
   ```

2. Access the API at `http://127.0.0.1:8000`.

3. Use tools like Postman or any other API client to interact with the API endpoints.

## API Endpoints

- **GET /api/posts**: Get a list of all blog posts.
- **GET /api/posts/{id}**: Get a specific blog post by its ID.
- **POST /api/posts**: Create a new blog post. Requires authentication.
- **PUT /api/posts/{id}**: Update an existing blog post. Requires authentication and authorization.
- **DELETE /api/posts/{id}**: Delete a blog post. Requires authentication and authorization.

## Authentication

To access protected routes, you need to provide an authentication token. You can login with the users below to obtain an authentication token.

email: user1@demo.com
password: user123

email: user2@demo.com
password: user123

## Postman Collection

[![Run in Postman](https://run.pstmn.io/button.svg)](https://god.gw.postman.com/run-collection/18901365-d179ac7b-a3a8-47c6-89f0-754067929282?action=collection%2Ffork&source=rip_markdown&collection-url=entityId%3D18901365-d179ac7b-a3a8-47c6-89f0-754067929282%26entityType%3Dcollection%26workspaceId%3Df9bc4aca-338f-4998-ac1d-d42a8df22e07)

Click the "Run in Postman" button above to import the Postman collection and start testing the API endpoints.

## GitHub Repository

[GitHub Repository Link](https://github.com/muhamed3li/blog-api)

