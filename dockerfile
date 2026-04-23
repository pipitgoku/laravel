#docker build -t pelatihan .
#docker images
#docker run --name pelatihan -p 8080:80 -d pelatihan:latest
#docker start pelatihan

#--Remove Container
#docker stop pelatihan
#docker rm pelatihan
#--Remove Image
#docker rmi pelatihan

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
