# altron test

[GitHub](http://github.com)

## Installation Instructions

The following instructions assumes that you are familiar with the necessary technologies required to carry out installation and that you have them already insalled in your machine.

Based on: 
* php 7.3.3
* Laravel 5.8.15
* phpunit 7.5.9
* mysql/mariadb 10.1.38-MariaDB


### Clone the repository:
```

$ git clone git@github.com:mokgosi/altron.git

```

### Install dependencies
```

$ composer update

```

### Create Database

```

mysql -u root -p<password>
CREATE DATABASE dbname;

```

**Create .env and app key**

```

$ cp .env.example .env
$ php artisan key:generate

``` 

**Update .env file with database name and credentials and other info**

```

APP_NAME=App Name
APP_URL=http://localhost:8000

DB_DATABASE=dbname
DB_USERNAME=username
DB_PASSWORD=password

```

**Run migrations and seeds**

```

$ php artisan migrate
$ php artisan db:seed

```

**Run tests**
```

$ vendor\bin\phpunit

```

**Start your local server**
```

$ cd to-your-project-root
$ php artisan serve

```

Browse to http://localhost:8000


**Login details**

username: admin@admin.com
password: secret

username: user@admin.com
password: secret


# API resources

**Get Users**

http://localhost:8000/api/v1/users


**Get Posts**

http://localhost:8000/api/v1/posts

