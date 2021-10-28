FROM mysql:latest


ENV MYSQL_DATABASE drupal-db
ENV MYSQL_ROOT_PASSWORD YOUR_PASSWORD

COPY drupal.sql /docker-entrypoint-initdb.d/drupal.sql

EXPOSE 3306