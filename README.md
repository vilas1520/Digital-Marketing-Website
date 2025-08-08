
# Digital Marketing Website (PHP + MySQL + Docker)

This project is a simple Digital Marketing website built with HTML, CSS, PHP, and MySQL. It is containerized using Docker and uses `docker-compose` for managing multi-container deployment.

## 📁 Project Structure

```
Digital-Marketing-Website/
├── Dockerfile
├── docker-compose.yml
├── index.php
├── index.html
├── contact.html
├── style.css
├── mysql-init/
│   └── init.sql
├── images/
├── css/
├── Js/
├── Fonts/
├── about.html
├── blog.html
├── project.html
├── services.html
├── README.md
```

---

## 🚀 How to Run This Project (On Ubuntu EC2 or Any Linux Server)

### Step 1: Clone the Repository

```bash
git clone https://github.com/vilas1520/Digital-Marketing-Website.git
cd Digital-Marketing-Website
```

---

### Step 2: Install Docker and Docker Compose

```bash
sudo apt update
sudo apt install docker.io docker-compose -y
sudo usermod -aG docker $USER
newgrp docker
```

---

### Step 3: Make Sure Docker Works

```bash
docker --version
docker-compose --version
```

---

### Step 4: Create MySQL Init File (Already exists)

Check `mysql-init/init.sql` contains:

```sql
CREATE DATABASE IF NOT EXISTS digital;

USE digital;

CREATE TABLE IF NOT EXISTS userdata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Email VARCHAR(255),
    Mobile VARCHAR(20),
    Website VARCHAR(255)
);
```

---

### Step 5: Update Apache Config (Handled by Dockerfile)

The Dockerfile includes:

```Dockerfile
FROM php:8.1-apache

RUN docker-php-ext-install mysqli
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html
RUN echo "DirectoryIndex index.html index.php" >> /etc/apache2/apache2.conf

EXPOSE 80
```

---

### Step 6: docker-compose.yml

```yaml
version: '3.8'

services:
  db:
    image: mysql:5.7
    container_name: digital-marketing-db
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: digital
    volumes:
      - ./mysql-init:/docker-entrypoint-initdb.d
    ports:
      - "3306:3306"

  web:
    build: .
    container_name: digital-marketing-web
    ports:
      - "8081:80"
    depends_on:
      - db
```

---

### Step 7: Start the Application

```bash
sudo docker-compose up --build -d
```

---

### Step 8: Access Your Website

Open in your browser:

```
http://<your-ec2-public-ip>:8081
```

---

### Step 9: Test Contact Form

Submit the form. You should see:

```
Contact Records Inserted
```

---

### Step 10: Access MySQL Database

1. Get MySQL container name:

```bash
docker ps
```

2. Connect to MySQL:

```bash
docker exec -it digital-marketing-db mysql -uroot -proot
```

3. Query the database:

```sql
USE digital;
SELECT * FROM userdata;
```

---

## 💡 Notes

- Port `8081` is used for Apache.
- Port `3306` is used for MySQL.
- Data is stored in MySQL container via `init.sql`.

---

## ✅ Done

Your Digital Marketing website is live and database-integrated inside Docker containers.

---
