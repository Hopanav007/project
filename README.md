1. установить git https://git-scm.com/, склонировать проект с https://github.com/Hopanav007/project.git
2. openserver https://ospanel.io/
3. composer скорее всего будет в опенсервере, если че https://getcomposer.org/download/
4. зайти в папку с проектом и запустить `composer install`
5. настроить опенсервер, настроить nginx:

```
server {
    server_name kental.kz;
    root /var/www/kental/public/;
    index index.php index.html;
    sendfile off;

    error_log  /var/log/nginx/kental_error.log;
    access_log /var/log/nginx/kental_access.log;

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
        try_files $uri =404;
    }

    location ~ \.php$ {
        try_files $uri /index.php =404;
        # fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass  unix:/run/php/php7.2-fpm.sock;
        fastcgi_index index.php;
        include       fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }
}
```

6. настроки базы данных в .env, скопировать из .env.example