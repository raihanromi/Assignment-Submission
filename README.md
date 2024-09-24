# Assignment Submission App

This is a simple **Assignment Submission App** built with Laravel. It allows students to submit their assignments and teachers to review them.

## Features

- **User Authentication**: Login/Registration for students and teachers.
- **Assignment Submission**: Students can upload assignments in various formats.
- **Assignment Review**: Teachers can view and download submitted assignments.
- **User Roles**: Role-based access control for students and teachers.
- **Dashboard**: Separate dashboards for students and teachers.


## Installation

Follow these steps to get the application up and running:

### 1. Clone the repository:


### 2. Install PHP dependencies: 
```bash
composer install

```

### 3. Set up the environment variables:

```bash

cp .env.example .env

```

### 4. Generate the application key:
```bash 
php artisan key:generate

```

### 5. Run database migrations:

```bash 
php artisan migrate

```

### 6. Install Node.js dependencies:

```bash 

npm install

```

### 7. Build front-end assets:

```bash 
npm run dev

```
### 9. Run the application:

```bash 

php artisan serve

```