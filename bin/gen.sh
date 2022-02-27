#!/bin/sh
# Ricardo Melo Martins

echo "Gerando o mapeamento de entidades"

export PATH=./src/Entity/ # diretório de destino dos arquivos
export PATH_PHP=/c/php74/php/ # diretório de instalação do php
alias php='${PATH_PHP}php.exe -c ${PATH_PHP}php.ini' # windows

php vendor/bin/doctrine orm:convert-mapping --force --from-database annotation $PATH
php vendor/bin/doctrine orm:generate-entities $PATH --generate-annotations=true
