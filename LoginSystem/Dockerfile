FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy all project files into the Apache web root
COPY . /var/www/html/

# Expose the web port
EXPOSE 8080

# Start Apache
CMD ["apache2-foreground"]
