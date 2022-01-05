CREATE DATABASE IF NOT EXISTS testLogin;

USE testLogin;

DROP TABLE IF EXISTS user;

CREATE TABLE user (
  username VARCHAR(20) NOT NULL,
  pw VARCHAR(20) NOT NULL,
  PRIMARY KEY (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;