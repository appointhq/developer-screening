# Developer Screening Process & Laravel Assessment
This application is designed to evaluate your Laravel expertise, coding style, adherence to SOLID principles, and ability to write unit tests.

## Overview
You will be tasked with developing a REST API. No frontend work is required; you can test the API using tools like Postman. We recommend committing your Postman collection when submitting the completed application.

## Routes
To view all the routes in the API, run the following command:
```
php artisan route:list
```

If you are running the application in localhost, the url will be 
```
http://localhost:8000/
http://localhost:8000/api/apps
http://localhost:8000/api/app-user-emails
http://localhost:8000/api/tasks
http://localhost:8000/api/users
```

## Database & migrations
We have added the database and migrations for this application and sqlite database is used.
```
php artisan migrate
php artisan db:seed
```

Following database tables will be created specifically for this application.
- users - users are stored in this table.
- apps - apps are stored in this table.
- app_users - users connected to the apps
- tasks - tasks for the users

(For more details, please check the database and migrations files.)

# Developer Tasks
## Part 1: API Implementation
### 1. App Controller
- Review and refactor the code for listing apps (GET /api/apps).
- Review and refactor the code for listing app user emails (GET /api/app-user-emails).
- Implement the logic to delete an app.

### 2. User Controller
- Implement the logic for user login.
- Implement the logic to delete a user.

### 3. Task Controller
- Add middleware for authentication to manage task operations.
- Implement full CRUD functionality for tasks.
- Implement the task listing (GET /api/tasks). The response should return the following JSON structure:
```
{
  "data": [
    {
      "id": 2,
      "title": "Task 1",
      "user": {
        "name": "Name of the user",
        "email": "user@example.com"
      },
      "app": {
        "name": "App 1"
      },
      "description": "Task 1 description",
      "task_date": "2024-10-08T09:33:29.000000Z",
      "completed_at": "2024-10-08T09:33:29.000000Z",
      "created_at": "2024-10-08T09:33:29.000000Z",
      "updated_at": "2024-10-08T09:33:29.000000Z"
    }
  ],
  ...
}
```

## Part 2: Unit Testing
- Write unit tests for the code you implement.
- Ensure your code coverage is above 90% by running:
```
php artisan test
php artisan test --profile --coverage --min=90
```

## Part 3: Code Review
Review the following methods and add relevant comments and suggestions for improvement:

- index() and userEmails() in AppController.
- list() and allAppUserEmails() in AppService.php.
- AppCollection resource.

## Part 4: Submitting
Please submit the completed application to your GitHub repository and send us the link.

## Getting Started

Download the latest source
```
git clone https://github.com/appointhq/developer-screening.git appointhq-dev-app
```
## Running the application
Go to appointhq-dev-app dir

```
cd appointhq-dev-app
```

If PHP is installed on your machine, you can run the application.
```
composer update

php artisan migrate

php artisan serve
```

## Other ways to run the application
If docker is installed on your machine, you can run the application.

```
docker run --rm -v $(pwd):/app composer install

docker-compose up -d

docker-compose exec api php artisan migrate
```

### Composer update
```
docker run --rm -v $(pwd):/app composer update
```

### Artisan about
```
docker-compose exec api php artisan about
```

### Run the migration
```
docker-compose exec api php artisan migrate
```

### Run the test
```
docker-compose exec api php artisan test --coverage
```

### Application url
http://localhost:8000/


### Run the database seeding first if requesting from postman
```
docker-compose exec api php artisan db:seed
```

## Docker Troubleshooting
In case docker is showing any issues or errors, please try following:

After downloading/cloning the project, run the following command:

```
$ cd appointhq-dev-app
$ docker run --rm -v $(pwd):/app composer install
$ sudo chown -R dev:dev .
```

## Install PHP 8.3
```
https://php.watch/articles/php-8.3-install-upgrade-on-debian-ubuntu#php83-debian-quick
```

## Install Composer
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```

## Artisan commands
Clear Application Cache
```
php artisan cache:clear
```
Clear Route Cache
```
php artisan route:clear
```
Clear Configuration Cache
```
php artisan config:clear
```