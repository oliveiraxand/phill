# Use a imagem base do MySQL 8.0.31
FROM mysql:8.0.31

# Defina a senha do root do MySQL
ENV MYSQL_ROOT_PASSWORD=password

# Exponha a porta 3306
EXPOSE 3306
