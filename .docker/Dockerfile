
ARG MYSQL_VERSION=8.0.26@sha256:d45561a65aba6edac77be36e0a53f0c1fba67b951cb728348522b671ad63f926
FROM "mysql:${MYSQL_VERSION}"

ENV DEBIAN_FRONTEND noninteractive

# RUN apt-get update \
#     && apt-get install -y wget unzip
#     && wget http://downloads.mysql.com/docs/sakila-db.zip \
#     && unzip sakila-db.zip

COPY .docker/script/sakila-schema.sql /docker-entrypoint-initdb.d/01_sakila-schema.sql
COPY .docker/script/sakila-data.sql /docker-entrypoint-initdb.d/02_sakila-data.sql

#####################################
# Set Timezone
#####################################

ARG TZ=UTC
ENV TZ ${TZ}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
&& chown -R mysql:root /var/lib/mysql/

RUN apt-get update \
 && apt-get install --no-install-recommends -y \
  locales \
 && rm -rf /var/lib/apt/lists/*

# COPY /script/my.cnf /etc/mysql/conf.d/my.cnf

# RUN chmod 0444 /etc/mysql/conf.d/my.cnf

# CMD ["mysqld"]

# EXPOSE 3306/tcp