#Skeleton kata php docker
Configuración básica para realizar alguna kata en PHP.

##Comandos para la alzar contenedro
```
$ docker-compose up -d
```
##Comando para acceder al contenedor
```
$ docker exec -it kata-test bash
```
##Instalar composer dentro del contenedor
Para poder installar la librerías que necesitamos
```
$ composer install --prefer-source --no-interaction
$ chown -R 1000:1000 vendor/

```

##Phpunit
Para ejecutar el test, dentro del contenedor
```
$ ./vendor/bin/phpunit tests/KataTest.php
```

##Make
Existe un fichero makefile para los comando más utilizados en la aplicación