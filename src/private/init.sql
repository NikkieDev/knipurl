CREATE DATABASE IF NOT EXISTS 'knipurl';
USE 'knipurl'

CREATE TABLE IF NOT EXISTS Users(
  `uid` INT(12) AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS knips(
  `kid` INT(12) AUTO_INCREMENT PRIMARY KEY,
  -- Add foreign key to user reference
)