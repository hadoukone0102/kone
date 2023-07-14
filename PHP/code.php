# Utilisez l'image officielle PHP avec Apache comme image de base
FROM php:7.4-apache

# Installez les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install -j$(nproc) \
    gd \
    mysqli \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    opcache \
    soap

# Copiez les fichiers de l'application dans l'image
COPY . /var/www/html

# Définissez le répertoire de travail
WORKDIR /var/www/html

# Définissez les autorisations sur le répertoire de travail
RUN chown -R www-data:www-data /var/www/html

# Définissez le port d'écoute de l'application
EXPOSE 80

# Commande par défaut pour démarrer Apache
CMD ["apache2-foreground"]
