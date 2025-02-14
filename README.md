<h1 style="color: #007acc;"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="100" alt="Laravel Logo"> TaskManager Laravel</h1>
Este proyecto fue creado con la version 11.42.0 de <a href="https://laravel.com" target="_blank">Laravel Framework</a>.

## 🚀 Instalación y ejecución

Para ejecutar el proyecto, primero empezamos creando el archivo `.env`, dentro del proyecto al nivel de `📂app`. A este mismo nivel encontraremos un archivo llamado `.env.example` el cual contiene un ejemplo de que debe contener, solo debemos configurar nuestro usuario, contraseña y la base de datos


AHora si pasamos a clonarlo con el comando `git clone`. Luego, se abre en el editor de código de preferencia y, desde una terminal dentro del proyecto, se ejecuta los siguientes comandos:

```
npm install
npm run build
composer install
```

Hay que esperar a que se completen las instalaciónes. Una vez finalizada, se procede a ejecutar el siguiente comando para realizar las migraciones junto con los seeders:

```
php artisan migrate --seed
```
Para terminar encendiendo el servidor con:

```
php artisan serve
```

## 📦 Librerías y dependencias

| Librería | Version | 
| ---------- | ----- |
| PHP | >=v8.2 |
| Node | >=v18 |
| Composer | v2.6.5 |
| Sanctum | v4.0.8 |
