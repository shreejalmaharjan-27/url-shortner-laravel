# WIP

## Laravel URL Shortner

### Install dependencies

`composer install && npm install`

### Create .env file

`cp .env.example .env`

Make sure to set the database credentials in .env file

### Generate key

`php artisan key:generate`

### Run migrations

`php artisan migrate`

### Run server

`php artisan serve & npm run dev`

#### Create an admin user

`php artisan create-admin {email} {password?}`

If you don't want to provide password as a clear text parameter, it will be asked for interactively.
