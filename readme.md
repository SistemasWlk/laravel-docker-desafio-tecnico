<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Instalação

- Realizar o clone

```
root@577187a1bdd4# git clone https://github.com/SistemasWlk/laravel-docker-desafio-tecnico.git 
```

- Acesse o branch master

```
root@577187a1bdd4# git checkout master 
```

- Entra na pasta raiz do projeto e executar o seguinte comando

```
root@577187a1bdd4# docker-compose up -d --build
```

- Logo em seguida no direóro raiz do projeto execute o compser install

```
root@577187a1bdd4# composer install
```

- Altere a permissão da pasta storage/

```
root@577187a1bdd4# chmod 777 storage/ -R
```

- Crie o arquivo de conviguração .env

```
root@577187a1bdd4# cp -v .envexemplo .env
```

- Execute os comando logo abaixo na pasta raiz

```
root@577187a1bdd4# php artisan key:generate
root@577187a1bdd4# php artisan config:clear
root@577187a1bdd4# php artisan config:cache
```

## Utilização

Acessa um navegador e digita as seguintes url
- http://localhost:8090/: phpMyAdmin 
- http://localhost:8088/: Desafio Técnico 

