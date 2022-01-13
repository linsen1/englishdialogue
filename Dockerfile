FROM alpine:3.13

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.tencent.com/g' /etc/apk/repositories \
    && apk add --update --no-cache \
    php7 \
    php7-json \
    php7-ctype \
	php7-exif \
    php7-fpm \
    php7-session \
    php7-pdo_mysql \
    php7-tokenizer \
    nginx \
    && rm -f /var/cache/apk/* \

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