# 写在最前面：强烈建议先阅读官方教程[Dockerfile最佳实践]（https://docs.docker.com/develop/develop-images/dockerfile_best-practices/）
# 选择构建用基础镜像（选择原则：在包含所有用到的依赖前提下尽可能提及小）。如需更换，请到[dockerhub官方仓库](https://hub.docker.com/_/php?tab=tags)自行选择后替换。
FROM php:7.4-fpm-alpine3.13

# 安装依赖包，如需其他依赖包，请到alpine依赖包管理(https://pkgs.alpinelinux.org/packages?name=php8*imagick*&branch=v3.13)查找。
# 选用国内镜像源以提高下载速度
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


FROM composer:latest as vendor

WORKDIR /app
COPY . /app
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