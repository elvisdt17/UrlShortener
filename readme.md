## URL Shortener

Simple url shortener API. The algorithm used here uses a dictionary of characters which will be used to generate the shortened url.

It works by providing a integer and then substracting of the dictionary a letter in the position of a number which is the result of finding the multiple value of the integer provided and the length of the dictionary while such integer is greater than zero.

## Requirements

- [Composer](https://getcomposer.org/download/).
- [Docker](https://www.docker.com/products/docker-desktop).


## Installation

Clone the repo in your local machine, then cd to the root directory and run:
```
    composer install
```

Then:
```
    cp .env.example .env
```

Once completed run:
```
    docker-compose up -d
```

After every docker container is up
run:
```
    php artisan migrate --seed
```
to run the migrations and seed the database

