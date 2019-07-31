# Wordpress Fashion shop

## How do I set this up?

### Clone the repo to your local machine

```html
git clone git@github.com:chidang/fashion-shop.git
```

### Import mysql database:
database: db_karo.sql

### Setup vitual host
Example: karo.me

### Update wp-config.php

```html
define( 'DB_NAME', 'YOUR_DATABASE_NAME' );
define( 'DB_USER', 'YOUR_DB_USER_ACCOUNT' );
define( 'DB_PASSWORD', 'YOUR_DB_USER_PASSWORD' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );
```

### Login to admin with account:

```html
Username: admin
Password: secret
```