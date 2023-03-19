## 1. Downloade Project
Run this at the command line<br>
```bash
https://github.com/aysetas/laravel-tarfinNetgsm-sms-job
```
## 2. Install Laravel
- For laravel packages and dependencies.
```bash
Composer install
```
- Copy `.env.example` to `.env` and change app url, app api url and database info.
- For generate app key.
```bash
php artisan key:generate
``` 
- For tarfin Netgsm 
```bash
 composer require tarfin-labs/netgsm  
```
```bash
 php artisan vendor:publish --provider="TarfinLabs\Netgsm\NetgsmServiceProvider" 
```


- For generate database
```bash
php artisan migrate 
``` 
## 3.Run The Project

- To run in browser
```bash
php artisan serve
``` 

## 4. Package Used

- **[TarfinNetgsm](https://github.com/tarfin-labs/netgsm)**


## 5. Technologies Used

- PHP Laravel Framework
- Mysql

