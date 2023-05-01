# Dynatech test task

Docker Image components:

- PHP 8 FPM.
- MySQL.
- nginx
- PhpMyAdmin for navigation in DB

## Running the environment

- Set the MySQL environment variables in `.env` file (or just leave as is). 
  You only will need to <b>set up your local virtual IP address in .env file (IPv4)</b>.
  It was the easyest way how to let Docker work with local routes.

- Build the app image with the following command (docker-compose must be installed first):

```bash
docker-compose build app
```
```bash
docker-compose up -d
```
All done!

<br>
URLs:

- Navigate browser to: http://localhost:8000
- For PhpMyAdmin:   http://localhost:8080  (l: dynatech / p: dynatech)
<br>

API endpoints:
- GET CVS reader
http://localhost:8000/app/api/readerEndpoint.php?sensor_uuid=2

-  POST JSON pusher
   http://localhost:8000/app/api/setterEndpoint.php



<br>
<b>Note</b>: API requests are called from the AJAX methods, so API URLs does not apear in the debug Browser Console window.

<br>
<br>
<b>P.s.</b>: Just have no time for two more additional API methods. But, at least, I wrote SQL for them. You can see it on Home page. 
<br>
<br>
<b>P.s.</b>: И небольшое наблюдение: Как минимум у меня, после того как поднялся Docker Image, надо подождать ~1 минуту, пока подключится база. Т.е. сначала вылетает Refuse connection. Не знаю с чем связано.  




