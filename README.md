# altron test

[GitHub](http://github.com)

## Installation Instructions

### Clone the repository:
```

git clone git@github.com:mokgosi/altron.git

```

### Install dependencies
```

composer update

```

### Create Database

```

mysql -u root -p<password>
CREATE DATABASE dbname;

```

**Create .env and app key**

```

cp .env.example .env
php artisan key:generate

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