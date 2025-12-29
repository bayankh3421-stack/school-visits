FROM php:8.1-cli

# تثبيت curl
RUN apt-get update && apt-get install -y libcurl4-openssl-dev \
    && docker-php-ext-install curl

WORKDIR /app

COPY . .

EXPOSE 10000

CMD ["php", "-S", "0.0.0.0:10000"]
