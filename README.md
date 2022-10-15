# Laravel API Docker
## Setup
1. Install Docker
1. Install Git bash
1. Clone source code

```
$ git clone https://petabit.backlog.jp/git/ETA/laravel.git
```
## Change .env
Copy .env.example -> .env.

Update .env file as necessary.

```
APP_NAME=project_name
DB_DATABASE=laravel_db
DB_USERNAME=user
DB_PASSWORD=pass
HTTP_PORT=80 (can change)
PHPMYADMIN_PORT=8080 (can change)
```

## start
```bash
./dev.sh
# press Ctrl + C to stop
```
*Only at the first time, it will take around 10 minutes to build docker images.*


## stop
```
./dev.sh stop
```

## rebuild docker image
```
./dev.sh build
```

## enter php docker
```
docker-compose exec app bash
```


## Test sending mail from command line
```bash
# enter php docker
docker-compose exec app bash
# start a tinker session
php artisan tinker
# use the Mail facade to send a quick test email
Mail::raw('Hello World!', function($msg) {$msg->to('myemail@gmail.com')->subject('Test Email'); });
```

## URL
- API: http://localhost
- phpMyAdmin: http://localhost:8080
- MailDev: http://localhost:8081
