
-- Tworzenie czystej bazy danych.
DROP   DATABASE IF     EXISTS calc;
CREATE DATABASE IF NOT EXISTS calc
    DEFAULT CHARACTER SET = 'utf8'
    DEFAULT COLLATE 'utf8_unicode_ci';

-- Wybieramy baze danych.
USE calc;

-- Tworzenie poszczgolnych tabel.
-- zbiory danych
SOURCE 01_table.sql
-- 