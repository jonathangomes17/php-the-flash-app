#!/bin/bash

if [ ! -f ".env" ]; then
    cp config/environment/.env.development .env
fi

if [ ! -f ".htaccess" ]; then
    cp .docker/apache/.htaccess .htaccess
fi

if [ ! -x "$(command -v node)" ]; then
   # node 13.6.0 - OK
   curl -sL https://deb.nodesource.com/setup_13.x | sudo -E bash -
   sudo apt-get install nodejs -y
   sleep 5
   npm install
else
   if [ ! -d "node_modules" ]; then
     npm install
   fi
fi

sudo docker network create frontend

sudo docker network create backend

sudo docker-compose up --build
