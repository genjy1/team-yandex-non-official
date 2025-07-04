# === СТАДИЯ 1: Получаем Composer ===
FROM composer:2 as composerstage

# === СТАДИЯ 2: PHP + Composer ===
FROM php:8.2-cli

RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip curl libzip-dev libxml2-dev zlib1g-dev libonig-dev \
    && docker-php-ext-install zip dom mbstring \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Копируем composer из первой стадии
COPY --from=composerstage /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/backend

COPY . .

RUN composer install

CMD ["php", "-S", "0.0.0.0:80", "index.php"]
