FROM php:8.1

ARG USER_ID
ARG GROUP_ID

RUN getent group $GROUP_ID || addgroup  --gid $GROUP_ID user \
     && adduser --disabled-password --gecos '' --uid $USER_ID --gid $GROUP_ID user

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /app

USER user

CMD exec "$@"