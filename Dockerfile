FROM ubuntu:latest
RUN apt-get update && apt-get install -y curl nginx

WORKDIR /var/www/html
COPY . .

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]