
-- Tabela przechowujaca podstawowe informcje identyfikujace profil.
CREATE TABLE calc_1
(
    id      	  BIGINT UNSIGNED    		NOT NULL AUTO_INCREMENT PRIMARY KEY,
    time   		  DATETIME           		NOT NULL,
    a      		  DOUBLE					,
    b      		  DOUBLE					,
    button  	  ENUM('sum', 'diff')       , 	
    useragent	  VARCHAR(255) 	  
);

