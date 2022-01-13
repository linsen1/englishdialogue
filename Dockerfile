FROM php:7.4-fpm-alpine3.13

RUN docker-php-ext-install pdo pdo_mysql sockets nginx

RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer




COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
RUN composer install

RUN cp /app/conf/nginx.conf /etc/nginx/conf.d/default.conf \
    && cp /app/conf/fpm.conf /etc/php7/php-fpm.d/www.conf \
    && cp /app/conf/php.ini /etc/php7/php.ini \
    && mkdir -p /run/nginx \
    && chmod -R 777 /app/storage \
    && mv /usr/sbin/php-fpm7 /usr/sbin/php-fpm

EXPOSE 80

# 容器启动执行脚本
CMD ["sh", "run.sh"]