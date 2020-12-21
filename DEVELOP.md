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

### Config database connection string

Open ./Common/config/main-local.php
modify components db as follow 
```php
    'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=rebb_db;dbname=rebb',
            'username' => 'rebb',
            'password' => 'rebbuser',
            'charset' => 'utf8',
        ]
```
### Init database
```shell script
$ yii migrate

# rbac
$ yii migrate --migrationPath=@yii/rbac/migrations
```

# Create admin user

Open http://localhost:21080/index.php?admin/user/signup, create user, login and ENJOY

# Use Rebb Gii generator and template

open app/backend/config/mai-local.php, add

```php
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
        'generators' => [
            'crud' => [
                'class' => 'app\template\crud\Generator',
                'templates' => [
                    'rebbCrud' => '@backend/template/crud/default',
                ]
            ],
            'model' => [
                'class' => 'app\template\model\Generator',
                'templates' => [
                    'rebbModel' => '@backend/template/model/default',
                ]
            ],
        ],
    ];
```

the model generator will add Timestamp behavior to handle created_at and updated_at column

the crud generator will use kartik-v widgets to show index/view/_form page