drop user 'root'@'localhost';
create user 'root'@'%' identified by '';
grant all privileges on *.* to 'root'@'%';
flush privileges;
