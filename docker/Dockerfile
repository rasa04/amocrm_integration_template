FROM php:8.3-fpm

ENV WORK_DIR /var/www/integration

RUN apt-get update && apt-get install -y \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
        && docker-php-ext-install -j$(nproc) pdo_mysql

COPY .. ${WORK_DIR}
WORKDIR ${WORK_DIR}
EXPOSE 9000

COPY wait-for-it.sh /usr/local/bin/wait-for-it.sh
RUN chmod +x /usr/local/bin/wait-for-it.sh

# Выполнить миграцию только после готовности MySQL, затем запустить php-fpm
CMD ["bash", "-c", "/usr/local/bin/wait-for-it.sh mysql:3306 -- php migrate.php && php-fpm"]
