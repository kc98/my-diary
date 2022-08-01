# My Diary

A diary system to allow user to create/update/view/delete diary.

## Run Locally

Clone the project

```bash
  git clone https://github.com/kc98/my-diary.git
```

Go to the project directory

```bash
  cd my-diary
```

Install frontend dependencies

```bash
  cd frontend
  npm install
```

Install backend packages

```bash
  cd backend
  composer install
```

Start the server

#### Frontend (In `frontend` folder)

```bash
  npm run dev
```

#### Backend (In `backend` folder)

```bash
  php artisan serve
```

## Setup .env File in backend

Create a `.env` file, copy the env from `.env.example` file and paste it to `.env` file.
Modify your DB setting in `.env`. Example:

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=my_diary
    DB_USERNAME=root
    DB_PASSWORD=
```

## Setup Database

Create a database with name `my_diary`.

### Running Migrations

To run all migrations, execute the migrate command:

```bash
  php artisan migrate
```

### Running Seeder

To run all seeders, execute the seeding command:

```bash
  php artisan db:seed
```
