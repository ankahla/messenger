# Simple chat app using mvc

## Usage
- Create account using email
- See connected user and send asynchronus messages (not in real time)

## Installation

- You need to have apache, mysql and php7 installed
- Import `setup/messenger.sql` into your mysql database
- Edit `config.php`


```php
...
// DATABASE
define('DB_DSN', 'mysql:host=localhost;dbname=messenger');
define('DB_USER', 'root');
define('DB_PASSWD', '');

define('BASE_URI', '/messenger');
...
```
