FROM php:apache

# instala composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# instalar git y zip
RUN apt-get update && apt-get install -yq \
	git \
	zip
