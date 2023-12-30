create database demo;

create table IF NOT EXISTS posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL,
)ENGINE=INNODB;

/* INSERT DUMMY DATA */

INSERT INTO posts (title) VALUES ('My Firsts Blog Post');
INSERT INTO posts (title) VALUES ('My Second Blog Post');

/* SELECTS */

SELECT id, title FROM posts;
SELECT title FROM posts where id = 1;