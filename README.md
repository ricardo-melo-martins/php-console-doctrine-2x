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

## Licença

É gratuito sob licença MIT e para mais informações veja [aqui](LICENSE).

Feito com diversão e :heart: por [Ricardo Melo Martins](https://github.com/ricardo-melo-martins).

