# Как разворачивать?

Устанавливаем доступы к базе в файле .env

### Доступы в адмику - slava@admin.com / 123123

```
composer update

cp .env.example .env

npm install

php artisan migrate --seed

gulp --production

php artisan key:generate
```


