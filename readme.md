Dalt Framework
==============

Dalt Framework - это простой, современный MVC PHP-фреймворк, предназначенный 
для создания и разработки веб-сайтов. 

### Установка

```sh
$ cd /path/to/htdocs
$ git clone https://github.com/volmir/dalt-framework.git
$ composer install
```

Путь к папке DocumentRoot (для настройки виртуальных хостов):

>для фронтеэнда: ./frontend/public

>для бекэнда: ./backend/public

Пример настройки виртуального хоста (Apache):

```apache
<VirtualHost *:80>
    <Directory "/var/www/dalt-framework">
        AllowOverride All
    </Directory>
    ServerName dalt-framework.local
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/dalt-framework/frontend/public
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

Пример настройки виртуального хоста (Nginx):

```nginx
upstream phpfcgi {
    server unix:/var/run/php/php7.0-fpm.sock;
}

server {
    listen 80;
    root /var/www/dalt-framework/frontend/public;
    index index.php;
    server_name dalt-framework.local;

    rewrite ^/index\.php/?(.*)$ /$1 permanent;

    location / {
        index index.php;
        try_files $uri @rewriteap;
    }

    location @rewriteap {
        rewrite  ^(.*)$ /index.php/$1 last;
    }

    location ~ ^/(index)\.php(/|$) {
        fastcgi_pass phpfcgi;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

Доступы к БД сохранены в файле **./common/config/main.php**

Дамп базы данных находится в файле **./tests/_data/dump.sql**

Данные пользователя для логина на фронтэнд:

>Login: user

>Password: 111111


Данные пользователя для логина на бекэнд:

>Login: admin

>Password: 111111



### Используемые технологии:

 - Веб-сервер
 - PHP 5.5.* или PHP 7.*
 - MySql 5.5.*
 - Composer
 - Codeception
 - PhpUnit
 - Twitter Bootstrap 3.3.6
 - PSR
