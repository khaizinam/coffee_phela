# Docker Setup cho Phela

## Cấu trúc Ports

- **Nginx (Web Server)**: Port 8020
- **phpMyAdmin**: Port 8021
- **MySQL/MariaDB**: Không expose ra ngoài (chỉ internal)

## Cài đặt và Chạy

1. **Build và khởi động containers:**
```bash
cd public_html
docker compose up -d --build
```

2. **Truy cập ứng dụng:**
- Website: http://localhost:8020
- phpMyAdmin: http://localhost:8021

3. **Thông tin đăng nhập phpMyAdmin:**
- Server: db
- Username: root
- Password: root

4. **Thông tin database:**
- Database: phela_db
- User: phela_user
- Password: root
- Host: db (trong container) hoặc localhost (từ host)

## Dữ liệu

Dữ liệu MySQL được lưu tại: `docker/data/mysql/`

## Dừng containers:

```bash
docker compose down
```

## Xóa dữ liệu (cẩn thận):

```bash
docker compose down -v
rm -rf docker/data/mysql/*
```

## Laravel Commands

Chạy artisan commands trong container:
```bash
docker compose exec app php artisan [command]
```

Cài đặt dependencies:
```bash
docker compose exec app composer install
```

Tạo APP_KEY:
```bash
docker compose exec app php artisan key:generate
```

