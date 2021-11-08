## Usage

```bash
$ git clone git@github.com:GJLuCkY/task-samruk.git
$ cd task-samruk
$ docker-compose build
$ docker-compose up -d
$ docker-compose exec php sh
$ cp .env.example .env
$ composer install
$ php artisan db:seed
```

http://localhost:8000


## Container structures

```bash
├── nginx
├── php
└── postgres
```

### php container

- Base image
  - [php](https://hub.docker.com/_/php):7.4-fpm-alpine

### nginx container

- Base image
  - [nginx](https://hub.docker.com/_/nginx):stable-alpine

### postgres container

- Base image
  - [postgres/psql-server](https://hub.docker.com/_/postgres):14-alpine
