Chuyển branch để xem các task theo mã phù hợp.

### Cách khởi chạy dụ án

- cài composer packages

```
composer install
```

- copy file env và khởi tạo app key

```
cp .env.example .env
php artisan key:generate
```

- tạo database

```
php artisan migrate
```

- cài đặt shield (role, permision...)

```
php artisan shield:install
```

- tạo tài khoản super admin

```
php artisan shield:super-admin
```

- cài node packages và build assets (dev)

```
npm install
npm run dev
```

- chạy serve local

```
php artisan serve
```
