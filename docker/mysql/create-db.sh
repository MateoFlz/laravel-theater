#!/usr/bin/env bash

mysql --user=root --password='secret.root' <<-EOSQL
    CREATE DATABASE IF NOT EXISTS laravel_theater;
    GRANT ALL PRIVILEGES ON \`laravel_theater%\`.* TO root@'%';
EOSQL
