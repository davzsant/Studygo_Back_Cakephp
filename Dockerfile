# Use uma imagem base do PHP com Apache
FROM php:8.1-apache

# Instale extensões necessárias para o CakePHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mysqli zip

# Habilite o módulo rewrite do Apache (necessário para rotas do CakePHP)
RUN a2enmod rewrite

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure o diretório de trabalho dentro do contêiner
WORKDIR /var/www/html

# Copie os arquivos do projeto para o contêiner
COPY . .

# Ajuste permissões para os diretórios temporários e de logs do CakePHP
RUN chmod -R 777 /var/www/html/tmp /var/www/html/logs

# Exponha a porta padrão do Apache
EXPOSE 80

# Inicie o servidor Apache
CMD ["apache2-foreground"]
