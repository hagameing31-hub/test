#!/usr/bin/env bash
# Chạy migration database nếu có (tạm thời bỏ qua nếu chưa dùng DB online)
# php artisan migrate --force

# Khởi động server PHP nhắm vào thư mục public của Laravel
php artisan config:cache
php artisan route:cache
php artisan serve --host=0.0.0.0 --port=$PORT
