## Usage

```bash
$ git clone git@github.com:GJLuCkY/task-samruk.git
$ cd task-samruk
$ make init
```

GET     - http://localhost:8000/api/posts (index)

GET     - http://localhost:8000/api/posts/{postId} (show)

POST    - http://localhost:8000/api/posts (create)

PUT     - http://localhost:8000/api/posts/{postId} (update)

DELETE  - http://localhost:8000/api/posts/{postId} (delete)


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
