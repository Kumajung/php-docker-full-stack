FROM php:8.2-apache

# เปิดส่วนขยายที่ใช้กับ MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

# (ทางเลือก) เปิด mod_rewrite ถ้าต้องใช้ pretty URL
RUN a2enmod rewrite

# คัดลอกโค้ดเข้า image (แทนการ bind mount)
COPY . /var/www/html

# (ทางเลือก) ถ้าใช้ public เป็น document root:
# RUN sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#g' /etc/apache2/sites-available/000-default.conf
