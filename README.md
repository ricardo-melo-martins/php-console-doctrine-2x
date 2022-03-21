# PHP Console Doctrine ORM 2.x


![License](https://img.shields.io/badge/license-MIT-green?style=plastic)  ![Php](https://img.shields.io/badge/-Php-394989?style=plastic&logo=php)

Terminal para testes de desenvolvimento com Doctrine 2.x 

## Requisitos
- PHP > 7.3x (usei 7.4.21)
- Composer
- Doctrine 2.11
## Instalação

``` bash
$ composer install
```

## Funcionamento

Execute o comando abaixo

``` bash
$ vendor/bin/doctrine
```

Deverá retornar a versão e uma lista de comando para utilizar o Doctrine

``` bash
$ Doctrine Command Line Interface 2.11.1.0
...
```
Rodando o teste de terminal

``` bash
$ composer cli
```
Deve conter na saída do terminal

```
...
Available commands:
  actor       Encontra um ator por id
...
```
Rodando com o comando `Actor` e `id`

``` bash
$ composer cli actor 1
```

Rodando para consultas com http

``` bash
$ composer start
```

e então abra a URL `http://127.0.0.1:8000` no navegador.

## Engenharia reversa

A versão 2.x ainda suporta, mas deve ser removida na 3.x

Segue abaixo um comando para gerar o mapeamento das tabelas, desde que as tabelas tenham "Primary Keys"

``` bash
$ vendor/bin/doctrine orm:convert-mapping --force --from-database annotation ./src/Entity/
```
E o comando para sobreescrever as entidades

``` bash
$ vendor/bin/doctrine orm:generate-entities ./src/Entity/ --generate-annotations=true
```

ou se preferir deixei um bash fazendo estes processos em `./bin`

``` bash
$ ./bin/gen.sh
```

## Usando bando de dados de exemplo

Em `src/Entity` tem alguns exemplos funcionais que podem ser alterados em `tests/index.php`.

Para brincar com estes exemplos precisa de um banco de dados instalado com o Sakila Mysql ou pode usar Docker, deixei preparado na pasta `.docker/`

Para fazer o build pode rodar bashs com os processos em `./bin/`, mas claro precisa ter o Docker instalado

``` bash
$ ./bin/docker-build.sh
```
Para subir um container a partir da imagem criada

``` bash
$ ./bin/docker-up.sh
```

Terminado com sucesso, verifique se o arquivo `./.docker/config/env.dev` possui as mesmas credenciais do arquivo `./config/config.php`


## Licença

É gratuito sob licença MIT e para mais informações veja [aqui](LICENSE).

Feito com diversão e :heart: por [Ricardo Melo Martins](https://github.com/ricardo-melo-martins).

