#/bin/bash

# Ricardo Melo Martins
#
# Referencias
# https://docs.docker.com/compose/reference/up/

echo "docker-compose up"

docker-compose -f ../.docker/docker-compose.yml up -d 

docker ps