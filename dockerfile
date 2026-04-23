#docker build -t pelatihan11 .
#docker images
#docker run --name pelatihan11 -p 8086:80 -d pelatihan11:latest
#docker start pelatihan11

#--Remove Container
#docker stop pelatihan11
#docker rm pelatihan11
#--Remove Image
#docker rmi pelatihan11

#--Volume
#docker volume create postgres-pelatihan

FROM jkaninda/nginx-php-fpm:8.2

WORKDIR /var/www/html
COPY . /var/www/html

#--PHP Extensions
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

#--Storage
VOLUME /var/www/html/storage

#--Permissions
RUN chown -R www-data:www-data /var/www/html

USER www-data
