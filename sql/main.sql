DROP   DATABASE IF     EXISTS database_name;
CREATE DATABASE IF NOT EXISTS database_name
    DEFAULT CHARACTER SET = 'utf8'
    DEFAULT COLLATE 'utf8_unicode_ci';

USE database_name;

CREATE TABLE log
(
    id      	  BIGINT UNSIGNED    		NOT NULL AUTO_INCREMENT PRIMARY KEY,
    time   		  DATETIME           		NOT NULL,
    a      		  DOUBLE					,
    b      		  DOUBLE					,
    button  	  ENUM('sum', 'diff')       ,
    useragent	  VARCHAR(255)
);
