-- Smartify Tech MySQL Database Setup
-- Run this script in MySQL to create the database and user

-- Create the database
CREATE DATABASE IF NOT EXISTS smartifytech CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Create a user for the application (optional - you can use root)
-- CREATE USER IF NOT EXISTS 'smartifytech'@'localhost' IDENTIFIED BY 'your_password_here';
-- GRANT ALL PRIVILEGES ON smartifytech.* TO 'smartifytech'@'localhost';
-- FLUSH PRIVILEGES;

-- Use the database
USE smartifytech;

-- Show the created database
SHOW DATABASES LIKE 'smartifytech';
