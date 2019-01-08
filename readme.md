#step1: install redis https://github.com/MicrosoftArchive/redis/releases

#step2: npm install -g laravel-echo-server

#step3: npm install

#step4: composer install

#step5: make .env from .env.example and `php artisan key:generate` config mysql, port, hostname user and password

#step6: php artisan migrate

#step7: php artisan migrate --seed

    seed db have 3 role admin, employee, saler, you can check there in database password:123456 in file seed

#step6: config .env and some port

`BROADCAST_DRIVER=redis`

`CACHE_DRIVER=file`

`QUEUE_CONNECTION=redis`

`SESSION_DRIVER=file`

`SESSION_LIFETIME=120`

`QUEUE_DRIVER=redis`

#step6: `laravel-echo-server init`
Quang Hung@INT-HUNGTQ MINGW64 /d/xampp/htdocs/laravel-echo/chat-app

$ laravel-echo-server init

? Do you want to run this server in development mode? (y/N) y

? Do you want to run this server in development mode? Yes

? Which port would you like to serve from? (6001)

? Which port would you like to serve from? 6001

? Which database would you like to use to store presence channel members? (Use

? Which database would you like to use to store presence channel members? redis

? Enter the host of your Laravel authentication server. (http://localhost) http://localhost:8000

? Enter the host of your Laravel authentication server. http://localhost:8000

? Will you be serving on http or https? (Use arrow keys)

? Will you be serving on http or https? http

? Do you want to generate a client ID/Key for HTTP API? (y/N) n

? Do you want to generate a client ID/Key for HTTP API? No

? Do you want to setup cross domain access to the API? (y/N) n

? Do you want to setup cross domain access to the API? No

? What do you want this config to be saved as? (laravel-echo-server.json)

? What do you want this config to be saved as? laravel-echo-server.json

Configuration file saved. Run laravel-echo-server start to run server.

#step7: `laravel-echo-server start`

#step8: `php artisan queue:work`

#step9: `npm run watch`

#step10: `php artisan serve` -> 127.0.0.1:8000 (localhost:8000)

account admin and employee only chating together in room1

account saler and employee only chating together in room2
