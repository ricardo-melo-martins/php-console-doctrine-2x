#/bin/bash

# Ricardo Melo Martins
# 
# Referencias
# https://docs.docker.com/engine/reference/commandline/build/

echo "docker build"

docker build -f .docker/Dockerfile --build-arg MYSQL_VERSION=8.0 -t rmm_mysql .