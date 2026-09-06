# Các lệnh cơ bản trong Laravel cho người mới

## 1. Khởi tạo dự án
- Tạo dự án mới qua Composer:
  `composer create-project laravel/laravel ten-du-an`
- Cài đặt các package (khi clone từ git về):
  `composer install`
- Tạo file `.env` (từ file mẫu):
  `cp .env.example .env` (Linux/Mac) hoặc `copy .env.example .env` (Windows)
- Tạo Application Key:
  `php artisan key:generate`

## 2. Chạy server (Localhost)
- Khởi động development server:
  `php artisan serve`
  *(Mặc định ứng dụng sẽ chạy tại `http://127.0.0.1:8000`)*

## 3. Cơ sở dữ liệu (MySQL)
- Cấu hình database trong file `.env`:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=ten_database
  DB_USERNAME=root
  DB_PASSWORD=mat_khau
  ```
- Chạy migrate để tạo các bảng trong CSDL (lưu ý bạn cần phải tạo database tên `ten_database` trong MySQL trước):
  `php artisan migrate`
- Khởi tạo dữ liệu mẫu (Seed):
  `php artisan db:seed`
- Vừa tạo lại toàn bộ bảng và tạo dữ liệu mẫu:
  `php artisan migrate:fresh --seed`

## 4. Tạo các thành phần (Make)
- Tạo Controller:
  `php artisan make:controller TenController`
- Tạo Model:
  `php artisan make:model TenModel`
- Tạo Model kèm theo Migration (-m):
  `php artisan make:model TenModel -m`
- Tạo Migration:
  `php artisan make:migration create_ten_bang_table`

## 5. Dọn dẹp bộ nhớ đệm (Cache)
- Xóa cache cấu hình:
  `php artisan config:clear`
- Xóa cache route:
  `php artisan route:clear`
- Xóa cache view:
  `php artisan view:clear`
- Xóa toàn bộ cache ứng dụng:
  `php artisan cache:clear`
