CREATE DATABASE IF NOT EXISTS currency_flow;
CREATE USER IF NOT EXISTS 'luka'@'%' IDENTIFIED BY 'passlukapass';

GRANT ALL ON currency_flow.* TO 'luka'@'%';
