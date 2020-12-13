# How to use docker to develop this project

### Clone the repository
```shell script
git clone https://github.com/tmfc/rebb.git
```

### Start docker containers via docker-compose
```shell script
docker-compose up -d
```

### Change mysql auth method
Open http://localhost:8000, change mysql auth method to native for user `rebb` by using phpmyadmin

### Install dependency

```shell script
$ docker exec -it rebb_back bash

# in container, execute
$ composer install
```

### Init project

```shell script
./init
# then follow the instruction to init
```

### Init database
```shell script
$ yii migrate

# rbac
$ yii migrate --migrationPath=@yii/rbac/migrations
```

# Create admin user

Open http://localhost:21080/index.php?admin/user/signup, create user, login and ENJOY