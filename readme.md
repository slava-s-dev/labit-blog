# Как разворачивать?

Устанавливаем доступы к базе в файле .env

```
composer update

cp .env.example .env

npm install

php artisan migrate --seed

gulp --production

php artisan key:generate
```


