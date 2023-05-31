## Contexto
Prueba que consiste en crear un crud de usuarios, en el cual se tienen que utilizar los modelos, controladores y vistas que posee laravel, en conjunto de ello con Mysql como base de datos relacional, se pide como requerimiento utilizar libreria de MaatWebSite/Excel para exportar los datos de los usuarios en un archivo excel.

## Requisitos
```bash
 PHP 7.4.33
 Laravel 8.75
```

## Instalación

### Clonamos el proyecto
```bash
git clone https://github.com/felipedeveloper24/prueba_maat_laravel.git
```

### Ingresamos a la carpeta del proyecto clonado
```bash
cd prueba_maat_laravel
```

### Ejecutamos el siguiente comando para instalar las dependencias

```bash
composer install
```

### Correr Migración

```bash
 php artisan migrate
```

### Ejecutar Seeder

```bash
 php artisan db:seed --class=UserTableSeeder
```

### Generar Key

```bash
 php artisan key:generate
```
### Arrancar proyecto

```bash
 php artisan serve
```
### Acceso a proyecto en navegador

```bash
 http://localhost:8000/
```