#!/bin/perl

system('mysql -u root < sql/main.sql');
system('php -S localhost:8000');