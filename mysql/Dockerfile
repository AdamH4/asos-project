FROM mysql/mysql-server:8.0

COPY ./create-db.sql /tmp

EXPOSE 3306

CMD [ "mysqld", "--init-file=/tmp/create-db.sql" ]
