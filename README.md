# catify
An example REST API for fetching animated gifs of cats

## Getting Started

The application is provided with a complete docker set up containing two docker containers. 

### Requirements

* [docker](https://docs.docker.com/install/)
* [docker compose](https://docs.docker.com/compose/install/)
* [composer](https://getcomposer.org/download/)
* That port 80 is unused on your environment by another service

### Starting the environment

    cd catify
    cp .env.example .env
    docker-compose up -d
    composer install
    
Copy some example data into the application

     cp gifs.yml storage/app/public/


The appication should then be available to view at 

    http://locahost

![Screenshot](/screenshot.png)
