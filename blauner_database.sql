DROP DATABASE IF EXISTS blauner;
CREATE DATABASE blauner;

USE blauner;

CREATE TABLE user (
id INT(255) PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(20) NOT NULL,
password VARCHAR(40) NOT NULL,
email VARCHAR(50) NOT NULL
);

INSERT INTO user VALUES
(1, "Riccardo","524a20cb4585e51d41309295e15280440d7af913","test@gmail.com"),
(2, "Luca","524a20cb4585e51d41309295e15280440d7af913","test2@gmail.com"),
(3, "Riccardo","524a20cb4585e51d41309295e15280440d7af913","test3@gmail.com"),
(4, "Marco","524a20cb4585e51d41309295e15280440d7af913","test4@gmail.com"),
(5, "Marco","524a20cb4585e51d41309295e15280440d7af913","test5@gmail.com"),
(6, "Riccardo","524a20cb4585e51d41309295e15280440d7af913","test6@gmail.com");
