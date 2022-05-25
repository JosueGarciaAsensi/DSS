![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)

# DSS Project

<br>

## Inicialización del proyecto

Se facilita el archivo ```.env``` en el índice privado.

<br>

## Entregas

### :one: Descripción del proyecto ✔️

Fecha límite de entrega: _18/02/2022_

Contenido: 
- _Descripción del proyecto_

Entregado: 
- [\_documentacion/Propuesta-proyecto.pdf](https://github.com/JosueGarciaAsensi/DSS/blob/main/_documentacion/Propuesta-proyecto.pdf)

A fecha de **_14/02/2022_**

<br>

### :two: Primera entrega ⏰

Fecha límite de entrega: _04/03/2022_

Contenido:
- _Creación del repositorio_
- _Diagrama de clases_ (3 clases)
- _Implementación_

Entregado:
- [\_documentacion/DiagramaClases.png](https://github.com/JosueGarciaAsensi/DSS/blob/main/_documentacion/DiagramaClases.png)

## Extra:

### Base de datos remota

Durante todo el desarrollo de la práctica hemos estado usando una base de datos remota para mantener la persistencia de datos durante todo el desarrollo. Esta base de datos se encuentra alojada en una Raspberry Pi de uno de los miembros del equipo.

### Dockerización

Hemos facilitado la dockerización del proyecto mediante las herramientas que nos brinda Composer. Para ello hemos usado Sail. Levantar un contendedor será tan sencillo como usar el comando siguiente:

```bash
bash ./vendor/laravel/sail/bin/sail up
```

En caso de no haber usado esta herramienta en ningún momento será conveniente añadirla a nuestros archivos del repositorio mediante el comando:

```bash
composer require laravel/sail --dev && php artisan sail:install
```
