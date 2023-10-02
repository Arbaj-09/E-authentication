-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS student_db;
-- Use the database
USE student_db;

-- Create the "students" table
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);