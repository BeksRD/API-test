# Api test
    
 This project is for making CRUD with server

## Endpoints
It takes JSON
    -Register/Authorize
        Register: POST /api/register   (name,email,password,password_confirmation) 
        Login: POST /api/login   (email,password) --you will take a token after registration
        
                

Get all subjects: GET /api/subjects

Get a single subject: GET /api/subjects/{id}

Create a new subject: POST /api/subjects

Update a subject: PUT /api/subjects/{id}

Delete a subject: DELETE /api/subjects/{id}


## Installation

install project to you[git install](https://www.linode.com/docs/guides/how-to-install-git-and-clone-a-github-repository/)

### Paces
1. [Install](https://devanswers.co/install-nginx-mysql-php-lemp-stack-ubuntu-20-04/) LEMP stack to your system.
2. Install project to you  /var/www/
```bash
git clone https://github.com/BeksRD/API-test
git pull https://github.com/BeksRD/API-test
composer update
```
3.Configure the server

```bash
sudo vim /etc/nginx/sites-available/your.conf
``` 
And write there
```bash
server {
        listen 127.1.1.1;
        root /var/www/test-project/public/;

        index index.php index.html index.htm;

        server_name test;

        location / {
                try_files $uri $uri/ /index.php$is_args$args;
        }

        location ~ \.php$ {
                include snippets/fastcgi-php.conf;
                fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        }

}
```
then
```bash
sudo ln -s /etc/nginx/sites-available/your.conf /etc/nginx/sites-enabled/your.conf
```
Add to hosts
```bash
sudo vim /etc/hosts
```
In
```bash
127.1.1.1       test
```
Restart Nginx
```bash
sudo service nginx restart
```







